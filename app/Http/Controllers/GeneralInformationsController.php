<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Interfaces\GeneralInformationRepository;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Validators\GeneralInformationValidator;

class GeneralInformationsController extends Controller
{
    protected $Information;
    protected $validator;

    public function __construct(GeneralInformationRepository $generalInformationRepository, GeneralInformationValidator $validator)
    {
        $this->Information = $generalInformationRepository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return response()->json($this->Information->orderBy('created_at', 'desc')->first());
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $generalInformation = $this->Information->create($request->all());

            return response()->json([
                'message' => 'Informasi Diperbarui.',
                'data'    => $generalInformation['data'] ?? [],
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }
}
