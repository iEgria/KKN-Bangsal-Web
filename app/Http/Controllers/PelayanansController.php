<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PelayananCreateRequest;
use App\Http\Requests\PelayananUpdateRequest;
use App\Interfaces\PelayananRepository;
use App\Validators\PelayananValidator;

class PelayanansController extends Controller
{
    protected $Pelayanan;
    protected $validator;

    public function __construct(PelayananRepository $repository, PelayananValidator $validator)
    {
        $this->Pelayanan = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $this->Pelayanan->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        return response()->json($this->Pelayanan->all());
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $relatedLink = $this->Pelayanan->create($request->all());

            return response()->json([
                'message' => 'Related Link created.',
                'data'    => $relatedLink,
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
        return response()->json($this->Pelayanan->find($id));
    }

    public function edit($id)
    {
        $relatedLink = $this->Pelayanan->find($id);

        return view('relatedLinks.edit', compact('relatedLink'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $relatedLink = $this->Pelayanan->update($request->all(), $id);

            return response()->json($relatedLink);
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
        $deleted = $this->Pelayanan->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'RelatedLink deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'RelatedLink deleted.');
    }
}
