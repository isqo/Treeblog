<?php

namespace App\Http\Middleware;

use App\Setup;
use Closure;
use Illuminate\Support\Facades\Schema;

class SetupMiddleWare
{
    protected $except_urls = [
        'setup'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $regex = '#' . implode('|', $this->except_urls) . '#';

        if (
            !preg_match($regex, $request->path()) && (!Schema::hasTable('setup') || !Setup::alreadyInstalled())
        ) {
            return redirect('setup');
        } elseif (preg_match($regex, $request->path()) && Schema::hasTable('setup') && Setup::alreadyInstalled()) {
            return redirect('/');
        }
        return $next($request);
    }
}
