<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LogsRequests
{
    public function handle($request, Closure $next)
    {
        $uuid = Str::uuid()->toString();

        Storage::disk('s3')->put("requests/{$uuid}", json_encode([
            'request' => $request->all(),
            'method' => $request->method(),
            'timestamp' => time(),
        ]));

        $request->merge(['request_id' => $uuid, 'timestamp' => time()]);

        return $next($request);
    }
}