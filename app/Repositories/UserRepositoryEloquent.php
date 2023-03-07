<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\User;
use App\Interfaces\UserRepository;
use App\Presenters\UserPresenter;
use App\Validators\UserValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    public function model()
    {
        return User::class;
    }

    // public function validator()
    // {
    //     return UserValidator::class;
    // }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return UserPresenter::class;
    }

    public function create($attribute)
    {
        $attribute['password'] = Hash::make($attribute['password']);
        $user = parent::create($attribute);
        return User::find($user['data']['id'])->syncRoles($attribute['roles']);
    }

    public function update($attribute, $id)
    {
        parent::update($attribute, $id);
        return User::find($id)->syncRoles($attribute['roles']);
    }

    public function changePassword($password)
    {
        return User::where(['id' => Auth::user()->id])->update(['password' => Hash::make($password)]);
    }

    public function resetPassword($id)
    {
        $user = User::find($id);
        return User::where(['id' => $id])->update(['password' => Hash::make($user->email)]);
    }
}
