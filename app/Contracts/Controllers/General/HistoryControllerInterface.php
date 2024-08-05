<?php

namespace App\Contracts\Controllers\General;

use App\Http\Requests\General\History\FilterRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

/**
 * Interface HistoryControllerInterface
 *
 * @package App\Contracts\Controllers\General
 */
interface HistoryControllerInterface
{
    /**
     * @return View
     */
    public function index(): View;

    /**
     * @param FilterRequest $request
     *
     * @return Collection
     */
    public function filter(FilterRequest $request): Collection;
}
