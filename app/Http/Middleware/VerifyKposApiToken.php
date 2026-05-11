<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyKposApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $validToken = config('services.kpos.api_token');

        if (!$validToken || !$token || !hash_equals($validToken, $token)) {
            return response()->json([
                'result' => false,
                'message' => 'Unauthorized.',
            ], 401);
        }

        return $next($request);
    }
}
