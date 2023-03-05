<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Interfaces\SliderRepository;
use App\Validators\SliderValidator;

class SlidersController extends Controller
{
    protected $Slider;
    protected $validator;

    public function __construct(SliderRepository $sliderRepository, SliderValidator $validator)
    {
        $this->Slider = $sliderRepository;
        $this->validator  = $validator;
    }

    public function index()
    {
        return response()->json($this->Slider->all());
    }

    public function store(Request $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $image = $request->file('image')->store('public/slider');
            $slider = $this->Slider->create(['image' => str_replace('public/', '', $image)]);

            return response()->json([
                'message' => 'Slider created.',
                'data'    => $slider
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
            'message' => 'Slider deleted.',
            'deleted' => $this->Slider->delete($id)
        ]);
    }
}
