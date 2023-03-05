<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Interfaces\GaleryRepository;
use App\Validators\GaleryValidator;

class GaleriesController extends Controller
{
    protected $Galery;
    protected $validator;

    public function __construct(GaleryRepository $galeryRepository, GaleryValidator $validator)
    {
        $this->Galery = $galeryRepository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return response()->json($this->Galery->all());
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $image = $request->file('image')->store('public/galery');
            $galery = $this->Galery->create(['image' => str_replace('public/', '', $image)]);

            return response()->json([
                'message' => 'Galery created.',
                'data'    => $galery
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
            'deleted' => $this->Galery->delete($id)
        ]);
    }
}
