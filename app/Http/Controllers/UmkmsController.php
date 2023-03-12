<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UmkmCreateRequest;
use App\Http\Requests\UmkmUpdateRequest;
use App\Interfaces\UmkmRepository;
use App\Validators\UmkmValidator;

/**
 * Class UmkmsController.
 *
 * @package namespace App\Http\Controllers;
 */
class UmkmsController extends Controller
{
    /**
     * @var UmkmRepository
     */
    protected $repository;

    /**
     * @var UmkmValidator
     */
    protected $validator;

    /**
     * UmkmsController constructor.
     *
     * @param UmkmRepository $repository
     * @param UmkmValidator $validator
     */
    public function __construct(UmkmRepository $repository, UmkmValidator $validator)
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
        $umkms = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $umkms,
            ]);
        }

        return view('umkms.index', compact('umkms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UmkmCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UmkmCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $umkm = $this->repository->create($request->all());

            $response = [
                'message' => 'Umkm created.',
                'data'    => $umkm->toArray(),
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
        $umkm = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $umkm,
            ]);
        }

        return view('umkms.show', compact('umkm'));
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
        $umkm = $this->repository->find($id);

        return view('umkms.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UmkmUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UmkmUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $umkm = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Umkm updated.',
                'data'    => $umkm->toArray(),
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
                'message' => 'Umkm deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Umkm deleted.');
    }
}
