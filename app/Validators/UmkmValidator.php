<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UmkmValidator.
 *
 * @package namespace App\Validators;
 */
class UmkmValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'pemilik' => ['required'],
            'usaha' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
            'photo' => ['image', 'max:2048'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'pemilik' => ['required'],
            'usaha' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required'],
            'photo' => ['image', 'max:2048'],
        ],
    ];
}
