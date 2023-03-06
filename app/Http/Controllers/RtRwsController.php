<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\RtRwCreateRequest;
use App\Http\Requests\RtRwUpdateRequest;
use App\Interfaces\RtRwRepository;
use App\Validators\RtRwValidator;

class RtRwsController extends Controller
{
    protected $RtRw;
    protected $validator;

    public function __construct(RtRwRepository $rtRwRepository, RtRwValidator $validator)
    {
        $this->RtRw = $rtRwRepository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $this->RtRw->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        return response()->json(
            $this->RtRw->whereHas('rt', function ($query) {
                $query->whereNotNull('rt_number');
            })->get()
        );
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $rtRw = $this->RtRw->create($request->all());

            return response()->json([
                'message' => 'RtRw created.',
                'data'    => $rtRw
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function show($id)
    {
        $rtRw = $this->RtRw->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $rtRw,
            ]);
        }

        return view('rtRws.show', compact('rtRw'));
    }

    public function edit($id)
    {
        $rtRw = $this->RtRw->find($id);

        return view('rtRws.edit', compact('rtRw'));
    }

    public function update(RtRwUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $rtRw = $this->RtRw->update($request->all(), $id);

            $response = [
                'message' => 'RtRw updated.',
                'data'    => $rtRw->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    public function destroy($id)
    {
        $deleted = $this->RtRw->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'RtRw deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RtRw deleted.');
    }
}
