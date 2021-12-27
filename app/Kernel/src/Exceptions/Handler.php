<?php

declare(strict_types=1);

namespace App\Kernel\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

final class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e): Response
    {
        if ($request->wantsJson()) {
            return response()->json(['error' => $this->prepareException($e)->getMessage()], 500);
        }

        return parent::render($request, $e);
    }
}
