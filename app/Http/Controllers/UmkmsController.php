<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Interfaces\UmkmRepository;
use App\Validators\UmkmValidator;

class UmkmsController extends Controller
{
    protected $Umkm;
    protected $validator;

    public function __construct(UmkmRepository $umkmRepository, UmkmValidator $validator)
    {
        $this->Umkm = $umkmRepository;
        $this->validator = $validator;
    }

    public function index()
    {
        $this->Umkm->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        return response()->json($this->Umkm->all());
    }

    public function store(Request $request)
    {

        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $Umkm = $request->all();
            if ($request->hasFile('photo')) {
                $Umkm['photo'] = str_replace('public/', '', $request->file('photo')->store('public/umkm'));
            }
            $Umkm = $this->Umkm->create($Umkm);

            return response()->json([
                'message' => 'Related Link created.',
                'data'    => $request->all(),
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
        return response()->json($this->Umkm->find($id));
    }

    public function edit($id)
    {
        $Umkm = $this->Umkm->find($id);

        return view('Umkms.edit', compact('Umkm'));
    }

    public function update(Request $request, $id)
    {
        return response()->json($request->all(), 500);
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $Umkm = $request->all();
            if ($request->hasFile('photo')) {
                $Umkm['photo'] = str_replace('public/', '', $request->file('photo')->store('public/umkm'));
            }
            $Umkm = $this->Umkm->update($Umkm, $id);

            return response()->json($Umkm);
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
        $deleted = $this->Umkm->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Umkm deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Umkm deleted.');
    }
}
