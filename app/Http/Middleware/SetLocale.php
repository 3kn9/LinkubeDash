<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        if(session()->exists('locale')){
            app()->setLocale(session()->get('locale'));
        } else {
            switch($request->getPreferredLanguage()){
                case 'zh':
                case 'zh_CN':
                case 'zh-CN':
                case 'zh-Hans':
                    app()->setLocale('zh-Hans');
                    break;
                default:
                    app()->setLocale('en');
            }
        }

        return $next($request);
    }
}
