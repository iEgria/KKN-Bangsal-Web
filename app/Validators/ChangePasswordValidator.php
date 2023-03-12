<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ChangePasswordValidator.
 *
 * @package namespace App\Validators;
 */
class ChangePasswordValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [
            'password_old' => ['required', 'current_password:sanctum'],
            'password' => ['required', 'min:8', 'confirmed', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
            'password_confirmation' => ['required'],
        ],
    ];

    protected $messages = [
        'password.regex' => 'Password harus mencangkup satu huruf besar dan angka'
    ];
}
