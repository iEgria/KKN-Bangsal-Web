<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UpdateProfileValidator.
 *
 * @package namespace App\Validators;
 */
class UpdateProfileValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [
            'email' => ['unique:users,email'],
            'name' => ['required'],
        ]
    ];
}
