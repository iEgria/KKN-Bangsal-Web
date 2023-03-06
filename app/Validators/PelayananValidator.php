<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PelayananValidator.
 *
 * @package namespace App\Validators;
 */
class PelayananValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nama' => ['required'],
            'syarat' => ['required']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nama' => ['required'],
            'syarat' => ['required']
        ],
    ];
}
