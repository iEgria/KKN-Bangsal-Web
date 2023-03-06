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
            $this->RtRw->whereHas('rw', function ($query) {
            })->orderBy('rw_number')->orderBy('rt_number')->get()
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
        return response()->json($this->RtRw->find($id));
    }


    public function update(Request $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $rtRw = $this->RtRw->update($request->all(), $id);

            return response()->json([
                'message' => 'RtRw updated.',
                'data'    => $rtRw
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }


    public function destroy($id)
    {
        return response()->json([
            'message' => 'RtRw deleted.',
            'deleted' => $this->RtRw->delete($id)
        ]);
    }
}
