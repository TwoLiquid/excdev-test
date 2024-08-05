<?php

namespace App\Support\Repository;

/**
 * Trait InitializeTrait
 *
 * @package App\Support\Repository
 */
trait InitializeTrait
{
    /**
     * Repository constructor
     */
    public function __construct()
    {
        /** @var int cacheTime */
        $this->cacheTime = config(
            'repository.' . camel_case(getRepositoryClassName(get_called_class())) . '.cacheTime',
            config('repository.default.cacheTime')
        );

        /** @var int perPage */
        $this->perPage = config(
            'repository.' . camel_case(getRepositoryClassName(get_called_class())) . '.perPage',
            config('repository.default.perPage')
        );

        /** @var string exceptionPath */
        $this->exceptionPath = 'exception/repository/' . camel_case(getRepositoryClassName(get_called_class()));
    }
}
