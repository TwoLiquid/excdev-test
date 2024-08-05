<?php

namespace App\Repositories;

/**
 * Class BaseRepository
 *
 * @package App\Repositories
 */
abstract class BaseRepository
{
    /**
     * Cache time
     *
     * @var int
     */
    protected int $cacheTime;

    /**
     * Path to exceptions
     *
     * @var string
     */
    protected string $exceptionPath;

    /**
     * Pagination step
     *
     * @var int
     */
    protected int $perPage;

    /**
     * @return int
     */
    public function getCacheTime(): int
    {
        return $this->cacheTime;
    }

    /**
     * @param int $cacheTime
     *
     * @return void
     */
    public function setCacheTime(int $cacheTime): void
    {
        $this->cacheTime = $cacheTime;
    }

    /**
     * @return string
     */
    public function getExceptionPath(): string
    {
        return $this->exceptionPath;
    }

    /**
     * @param string $exceptionPath
     *
     * @return void
     */
    public function setExceptionPath(string $exceptionPath): void
    {
        $this->exceptionPath = $exceptionPath;
    }

    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     */
    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }
}
