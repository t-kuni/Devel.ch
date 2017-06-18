<?php

namespace App\Http\Middleware;

use Closure;
use App\Thread;

class ThreadMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->id;
        $thread = Thread::findOrFail($id);

        $request->merge([
            'thread' => $thread,
        ]);

        return $next($request);
    }
}
