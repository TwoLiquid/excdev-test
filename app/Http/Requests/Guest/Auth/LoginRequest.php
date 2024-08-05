<?php

namespace App\Http\Requests\Guest\Auth;

use App\Http\Requests\BaseRequest;

/**
 * Class LoginRequest
 *
 * @property string $login
 * @property string $password
 *
 * @package App\Http\Requests\Guest\Auth
 */
class LoginRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'login'    => 'required|string|exists:users,email',
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'login.required'    => trans('validation.required', ['attribute' => 'login']),
            'login.string'      => trans('validation.string', ['attribute' => 'login']),
            'login.exists'      => trans('validation.exists', ['attribute' => 'login']),
            'password.required' => trans('validation.required', ['attribute' => 'password']),
            'password.string'   => trans('validation.string', ['attribute' => 'password'])
        ];
    }
}
