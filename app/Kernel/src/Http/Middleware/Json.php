<?php

declare(strict_types=1);

namespace App\Kernel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

final class Json
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
