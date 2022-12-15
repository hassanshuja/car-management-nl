<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Session;

class Language
{

    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        // $this->app->setLocale(session('my_locale', $request->segment(2)));
        if(in_array($request->segment(2), config('app.available_locale'))){
            $this->app->setLocale($request->segment(2));
        }else{
            $this->app->setLocale(config('app.locale'));
        }
        // session(['my_locale' => 'du']);
        // dd($request->segment(2),session('my_locale'), $this->app->getLocale());
        // dd(Session::all());


        return $next($request);
    }
}
