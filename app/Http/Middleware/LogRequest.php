<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequest
{
    public function handle($request, Closure $next)
    {
        $logData = [
            'url' => $request->fullUrl(),
            'datetime' => now()->toDateTimeString(),
            'ip' => $request->ip(),
        ];

        Log::channel('request')->info('Request Received', $logData);

        return $next($request);
    }
}