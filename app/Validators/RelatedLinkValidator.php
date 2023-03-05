<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RelatedLinkValidator.
 *
 * @package namespace App\Validators;
 */
class RelatedLinkValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => ['required'],
            'url' => ['required', 'url'],
            'logo' => ['image', 'dimensions:max_width=512,max_height=512']
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => ['required'],
            'url' => ['required', 'url'],
            'logo' => ['image', 'dimensions:max_width=512,max_height=512']
        ],
    ];
}
