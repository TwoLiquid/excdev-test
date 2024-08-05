<?php

use App\Contracts\Repositories\User\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Contracts\Repositories\User\UserBalanceRepositoryInterface;
use App\Repositories\User\UserBalanceRepository;
use App\Contracts\Repositories\User\UserBalanceOperationRepositoryInterface;
use App\Repositories\User\UserBalanceOperationRepository;

return [

    /*
    |--------------------------------------------------------------------------
    | Repository Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default repository parameters.
    |
    */

    'default' => [
        'cacheTime' => env('REPOSITORY_CACHE_TIME', 0),
        'perPage'   => env('REPOSITORY_PER_PAGE', 18),
    ],

    /*
    |--------------------------------------------------------------------------
    | Service provider boot drivers
    |--------------------------------------------------------------------------
    |
    | This option controls service providers instances and concrete data
    |
    */

    'boot' => [
        UserRepositoryInterface::class => UserRepository::class,
        UserBalanceRepositoryInterface::class => UserBalanceRepository::class,
        UserBalanceOperationRepositoryInterface::class => UserBalanceOperationRepository::class
    ]

];
