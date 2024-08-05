<?php

use App\Contracts\Services\User\UserServiceInterface;
use App\Services\UserService;
use App\Contracts\Services\User\UserBalanceServiceInterface;
use App\Services\UserBalanceService;

return [

    /*
    |--------------------------------------------------------------------------
    | Service provider boot drivers
    |--------------------------------------------------------------------------
    |
    | This option controls service providers instances and concrete data
    |
    */

    'boot' => [
        UserServiceInterface::class => UserService::class,
        UserBalanceServiceInterface::class => UserBalanceService::class
    ]

];
