<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RtRwValidator.
 *
 * @package namespace App\Validators;
 */
class RtRwValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'rt_number' => ['integer'],
            'rw_number' => ['integer'],
            'nama' => ['required', 'string']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'rt_number' => ['integer'],
            'rw_number' => ['integer'],
            'nama' => ['required', 'string']
        ],
    ];
}
