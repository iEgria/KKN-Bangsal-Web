<?php

namespace App\Validators;

use Illuminate\Validation\Factory;
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
    protected $rules = [];

    public function __construct(Factory $validator)
    {
        parent::__construct($validator);

        $this->rules = [
            self::RULE_CREATE => [
                'email' => ['required', 'min:6', 'unique:users'],
                'name' => ['required'],
                'password' => ['required', 'min:8', 'confirmed', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
                'password_confirmation' => ['required'],
                'roles' => ['required', 'array'],
            ],
            self::RULE_UPDATE => [
                'email' => ['required', 'min:6', 'unique:users'],
                'name' => ['required'],
                'roles' => ['required', 'array'],
            ],
        ];
    }

    protected $messages = [
        'password.regex' => 'Password harus mencangkup satu huruf besar dan angka'
    ];
}
