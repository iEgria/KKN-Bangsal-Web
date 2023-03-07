<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\StukturOrganisasiCreateRequest;
use App\Http\Requests\StukturOrganisasiUpdateRequest;
use App\Interfaces\StukturOrganisasiRepository;
use App\Validators\StukturOrganisasiValidator;

class StukturOrganisasisController extends Controller
{
    protected $StrukturOrganisasi;
    protected $validator;

    public function __construct(StukturOrganisasiRepository $repository, StukturOrganisasiValidator $validator)
    {
        $this->StrukturOrganisasi = $repository;
        $this->validator  = $validator;
    }

    public function index()
    {
        $stuktur = $this->StrukturOrganisasi->orderByDesc('created_at')->first()->toArray();
        $stuktur['image'] = url('storage/' . $stuktur['image']);
        return response()->json(['data' => $stuktur]);
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $image = $request->file('image')->store('public/struktur_organisasi');
            $data = $this->StrukturOrganisasi->create(['image' => str_replace('public/', '', $image)]);

            return response()->json([
                'message' => 'StrukturOrganisasi created.',
                'data'    => $data
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
            'message' => 'Galery deleted.',
            'deleted' => $this->StrukturOrganisasi->delete($id)
        ]);
    }
}
