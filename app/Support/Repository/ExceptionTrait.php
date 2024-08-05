<?php

namespace App\Support\Repository;

/**
 * Trait ExceptionTrait
 *
 * @package App\Support\Repository
 */
trait ExceptionTrait
{
    /**
     * @param string $method
     *
     * @return string
     */
    public function getExceptionMessage(
        string $method
    ): string {

        $messageKey = implode('.',  [
            $this->exceptionPath,
            $method
        ]);

        return trans()->has($messageKey)
            ? trans($messageKey)
            : trans('exception/repository/default.error.message');
    }
}
