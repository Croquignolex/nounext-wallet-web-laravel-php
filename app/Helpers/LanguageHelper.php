<?php

if(!function_exists('route_manager'))
{
    /**
     * @param $route_name
     * @param array|null $route_parameters
     * @return string
     */
    function route_manager($route_name, array $route_parameters = null)
    {
        $current_language = Illuminate\Support\Facades\App::getLocale();
 
        return $route_parameters == null ?
            route($route_name, ['language' => $current_language]) :
            route($route_name, array_collapse([['language' => $current_language], $route_parameters]));
    }
}
if(!function_exists('array_regex'))
{
    /**
     * @param array $array
     * @return string
     */
    function array_regex(array $array)
    {
        $regex = '';
        foreach($array as $item) $regex .= $item . '|';
        $regex = str_replace_last('|', '', $regex);

        return $regex;
    }
}