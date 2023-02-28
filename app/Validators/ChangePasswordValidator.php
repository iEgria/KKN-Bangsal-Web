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
            'password_old' => ['required', 'current_password:api'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ],
    ];
}
