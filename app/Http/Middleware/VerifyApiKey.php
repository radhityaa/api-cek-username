<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('API-KEY');
        $apiId = $request->header('API-ID');

        if (!$apiKey || !$apiId) {
            return response()->json([
                'success' => false,
                'message' => 'Missing API-KEY or API-ID'
            ], 401);
        }

        $user = User::where('api_key', $apiKey)->where('api_id', $apiId)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        return $next($request);
    }
}
