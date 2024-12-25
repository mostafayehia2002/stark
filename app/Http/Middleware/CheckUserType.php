<?php

namespace App\Http\Middleware;

use App\Traits\HttpResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    use HttpResponse;

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        // Assuming user type is stored in the `type` field of the authenticated user
        if (auth()->check() && auth()->user()->type !== $type) {
            return $this->returnErrorMessage(
                403,
                translate_message('unauthorized_access')
            );


        }

        return $next($request);

    }
}
