<?php

namespace App\Http\Requests\General\History;

use App\Http\Requests\BaseRequest;

/**
 * Class FilterRequest
 *
 * @property string $order
 * @property string $search
 * @property int $limit
 *
 * @package App\Http\Requests\General\History
 */
class FilterRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'order'  => 'string|nullable',
            'search' => 'string|nullable',
            'limit'  => 'integer|nullable'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'order.string'  => trans('validation.string', ['attribute' => 'order']),
            'search.string' => trans('validation.string', ['attribute' => 'search']),
            'limit.integer' => trans('validation.integer', ['attribute' => 'limit']),
        ];
    }
}
