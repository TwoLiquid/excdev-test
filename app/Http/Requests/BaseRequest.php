<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BaseRequest
 *
 * @package App\Http\Requests
 */
abstract class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
