<?php

namespace App\Exceptions\Repository;

use Exception;

/**
 * Class RepositoryException
 *
 * @package App\Exceptions\Repository
 */
class RepositoryException extends Exception
{
    /**
     * @var string
     */
    protected string $responseMessage;

    /**
     * RepositoryException constructor
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        /** @var string responseMessage */
        $this->responseMessage = $message;

        parent::__construct(
            $this->getMessage(),
            $this->code
        );
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->responseMessage;
    }
}
