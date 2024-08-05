<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class OnlyAjax
 *
 * @package App\Http\Middleware
 */
class OnlyAjax
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        if (! $request->ajax())
            throw new NotFoundHttpException();

        return $next($request);
    }
}
