<?php

namespace App\Validators;

use Illuminate\Validation\Rule;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => ['required', 'min:6', 'unique:users'],
            'name' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
            'roles' => ['required', 'array'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'email' => ['required', 'min:6', 'unique:users'],
            'name' => ['required'],
            'roles' => ['required', 'array'],
        ],
    ];
}
