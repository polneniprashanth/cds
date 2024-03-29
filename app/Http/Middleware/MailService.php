<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;

class MailService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $app = App::getInstance();
        $app->register('App\Providers\MailConfigProvider');
        return $next($request);
    }
}
