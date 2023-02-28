<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepository;
use App\Validators\ChangePasswordValidator;
use App\Validators\UpdateProfileValidator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class AuthController extends Controller
{

    protected $User;
    protected $ChangePasswordValidator, $UpdateProfileValidator;

    public function __construct(UserRepository $userRepository, ChangePasswordValidator $changePasswordValidator, UpdateProfileValidator $updateProfileValidator)
    {
        $this->User = $userRepository;
        $this->ChangePasswordValidator = $changePasswordValidator;
        $this->UpdateProfileValidator = $updateProfileValidator;
    }

    public function login(Request $request)
    {
        $user = $this->User->with('roles')->where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => true, 'message' => 'Akun tidak ditemukan']);
        } else {
            return response()->json([
                'message' => 'Sukses Login',
                'data' => [
                    'name' => $user->name,
                    'token' => $user->createToken(Carbon::now())->plainTextToken,
                    'roles' => $user->roles->pluck('name'),
                ]
            ]);
        }
    }

    public function checkSession()
    {
        $user = $this->User->with('roles')->where(['id' => Auth::user()->id])->first();
        return response()->json([
            'data' => [
                'name' => $user->name,
                'roles' => $user->roles->pluck('name'),
            ]
        ]);
    }

    public function changePassword(Request $request)
    {
        try {
            $this->ChangePasswordValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $user = $this->User->changePassword($request->password);

            return response()->json([
                'message' => 'Sukses Update Password.',
                'data'    => $user->toArray(),
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $this->UpdateProfileValidator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            if ($request->email) {
                $newData = ['email' => $request->email, 'name' => $request->name];
            } else {
                $newData = ['name' => $request->name];
            }

            $this->User->where(['id' => Auth::user()->id])->update($newData);

            return response()->json([
                'message' => 'Sukses Update Profil.',
            ]);
        } catch (ValidatorException $e) {
            return response()->json([
                'error'   => true,
                'message' => $e->getMessageBag()
            ]);
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()->currentAccessToken()->delete()) {
            return response()->json([
                'message' => 'Sukses Logout.',
            ]);
        }
    }
}
