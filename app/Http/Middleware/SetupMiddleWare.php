<?php

namespace App\Http\Middleware;

use App\Setup;
use Closure;

class SetupMiddleWare
{
    private $setup;

    public function __construct(Setup $setup)
    {
        $this->setup = $setup;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $regex = '#setup#';

        if (!$this->setup->alreadyInstalled())
            if (!preg_match($regex, $request->path()))
                return redirect('setup');
            else
                return $next($request);

        if (preg_match($regex, $request->path()))
            return redirect('/');

        return $next($request);
    }
}
