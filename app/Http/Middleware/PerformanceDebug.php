<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PerformanceDebug
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        // 确保在开发环境下
        if (app()->isLocal()) {
//
//            // 计算包含了多少文件
//            $included_files_count = count(get_included_files());
//
//            dd($included_files_count);
        }

        return $next($request);
    }
}
