<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepository;
use App\Transformers\UserTransformer;
use App\Validators\UserValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $User;
    protected $UserValidator;

    public function __construct(UserRepository $userRepository, UserValidator $userValidator)
    {
        $this->User = $userRepository;
        $this->UserValidator = $userValidator;
    }

    public function index()
    {
        $this->User->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        return response()->json($this->User->all());
    }

    public function datatable()
    {
        return DataTables::eloquent($this->User->select('*'))->setTransformer(UserTransformer::class)->make(true);
    }

    public function resetPassword(Request $request)
    {
        if ($this->User->resetPassword($request->id)) {
            return response()->json(['message' => 'Password berhasil direset.']);
        }
    }

    public function store(Request $request)
    {
        try {

            $this->UserValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $user = $this->User->create($request->all());

            return response()->json([
                'message' => 'Pengguna Berhasil Ditambahkan.',
                'data'    => $user['data'] ?? $user,
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
        return response()->json($this->User->find($id));
    }

    public function update(Request $request, $id)
    {
        try {

            $this->UserValidator->with($request->all())->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $user = $this->User->update($request->all(), $id);

            return response()->json([
                'message' => 'user updated.',
                'data'    => $user,
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
        $deleted = $this->User->delete($id);
        return response()->json([
            'message' => 'Pengguna Berhasil Dihapus deleted.',
            'deleted' => $deleted,
        ]);
    }
}
