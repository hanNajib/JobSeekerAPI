<?php

namespace App\Http\Middleware;

use App\Models\Societies;
use App\Services\ResponseService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->query('token');

        $societies = Societies::where('login_tokens', $token)->first();
        if(!$societies || empty($token)) {
            ResponseService::json([
                'message' => 'Unauthorized user'
            ], 401);
        }

        $request->attributes->set('societies', $societies);
        return $next($request);
    }
}
