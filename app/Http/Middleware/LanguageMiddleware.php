<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
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
        $routePath = $request->path();
        $routeLanguage = $this->getRouteLanguage($routePath);
        $this->setAppLanguage($routeLanguage);
        return $next($request);
    }


    /**
     * @param $path
     * @return string
     */
    private function getRouteLanguage($path)
    {
        $pathAsTab = explode('/', $path);
        $languageList = config('app.locale_list');

            foreach ($languageList as $lang)
                if(in_array($lang, $pathAsTab)) return $lang;


        return config('app.fallback_locale');
    }

    /**
     * @param $language
     */
    private function setAppLanguage($language)
    {
        App::setLocale($language);
    }
}
