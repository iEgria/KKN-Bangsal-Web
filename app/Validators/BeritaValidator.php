<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class BeritaValidator.
 *
 * @package namespace App\Validators;
 */
class BeritaValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => ['required'],
            'cover' => ['required', 'image', 'max:2048'],
            'content' => ['required'],
            'published_at' => ['required'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => ['required'],
            'cover' => ['image', 'max:2048'],
            'content' => ['required'],
            'published_at' => ['required'],
        ],
    ];
}
