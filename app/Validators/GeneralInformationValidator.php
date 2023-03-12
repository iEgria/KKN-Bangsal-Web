<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class GeneralInformationValidator.
 *
 * @package namespace App\Validators;
 */
class GeneralInformationValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => ['required', ['email']],
            'instagram' => ['required'],
            'phone' => ['required'],
            'sejarah_desa' => ['required'],
            'visi_misi' => ['required'],
            'penduduk_pria' => ['required', 'integer'],
            'penduduk_wanita' => ['required', 'integer']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'email' => ['required', ['email']],
            'instagram' => ['required'],
            'phone' => ['required'],
            'sejarah_desa' => ['required'],
            'visi_misi' => ['required'],
            'penduduk_pria' => ['required', 'integer'],
            'penduduk_wanita' => ['required', 'integer']
        ],
    ];
}
