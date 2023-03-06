<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Interfaces\SejarahDesaRepository;
use App\Validators\SejarahDesaValidator;

class SejarahDesasController extends Controller
{
    protected $SejarahDesa;
    protected $validator;

    public function __construct(SejarahDesaRepository $sejarahDesaRepository, SejarahDesaValidator $validator)
    {
        $this->SejarahDesa = $sejarahDesaRepository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return response()->json(['data' => $this->SejarahDesa->orderBy('created_at', 'desc')->first()]);
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $sejarahDesa = $this->SejarahDesa->create($request->all());

            return response()->json([
                'message' => 'Informasi Diperbarui.',
                'data'    => $sejarahDesa
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }
}
