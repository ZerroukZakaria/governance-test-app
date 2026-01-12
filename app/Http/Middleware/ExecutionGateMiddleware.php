<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExecutionGateMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /*
         * Governance-controlled execution gate.
         * No business logic allowed here.
         * Assume governance runtime enforces:
         * - activation
         * - billing
         * - authorization
         */

        // TEMP: allow all for now (we are testing structure, not enforcement)
        return $next($request);
    }
}
