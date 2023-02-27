<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GeneralInformationCreateRequest;
use App\Http\Requests\GeneralInformationUpdateRequest;
use App\Repositories\GeneralInformationRepository;
use App\Validators\GeneralInformationValidator;

/**
 * Class GeneralInformationsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GeneralInformationsController extends Controller
{
    /**
     * @var GeneralInformationRepository
     */
    protected $repository;

    /**
     * @var GeneralInformationValidator
     */
    protected $validator;

    /**
     * GeneralInformationsController constructor.
     *
     * @param GeneralInformationRepository $repository
     * @param GeneralInformationValidator $validator
     */
    public function __construct(GeneralInformationRepository $repository, GeneralInformationValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $generalInformations = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $generalInformations,
            ]);
        }

        return view('generalInformations.index', compact('generalInformations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GeneralInformationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(GeneralInformationCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $generalInformation = $this->repository->create($request->all());

            $response = [
                'message' => 'GeneralInformation created.',
                'data'    => $generalInformation->toArray(),
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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generalInformation = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $generalInformation,
            ]);
        }

        return view('generalInformations.show', compact('generalInformation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $generalInformation = $this->repository->find($id);

        return view('generalInformations.edit', compact('generalInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GeneralInformationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(GeneralInformationUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $generalInformation = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'GeneralInformation updated.',
                'data'    => $generalInformation->toArray(),
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'GeneralInformation deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'GeneralInformation deleted.');
    }
}
