<?php

if(!function_exists('page_title'))
{
    /**
     * @param $page
     * @return \Illuminate\Config\Repository|mixed|string
     */
    function page_title($page)
    {
        $base_name = config('app.name');
        return $page === '' ? $base_name : __($page) . ' - ' .  $base_name;
    }
}

if(!function_exists('active_page'))
{
    /**lightSpeedOut
     * @param $route
     * @return string
     */
    function active_page($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if(!function_exists('flash_message'))
{
    /**
     * @param $title
     * @param $message
     * @param string $type
     * @param string $icon
     * @param string $enter
     * @param string $exit
     * @param int $delay
     */
    function flash_message($title, $message, $type = 'info', $icon = 'oi oi-pin', $enter = 'lightSpeedIn', $exit = 'lightSpeedOut',  $delay = 5000)
    {
        session()->flash('notification.icon', $icon);
        session()->flash('notification.type', $type); 
        session()->flash('notification.title', $title);
        session()->flash('notification.delay', $delay);  
        session()->flash('notification.message', $message); 
        session()->flash('notification.animate.exit', $exit);
        session()->flash('notification.animate.enter', $enter); 
    }
}

if(!function_exists('text_format'))
{

    /**
     * @param $text
     * @param $maxCharacters
     * @return string
     */
    function text_format($text, $maxCharacters)
    {
        if(strlen($text) <= $maxCharacters)
            return $text;
        else
            return substr($text, 0, $maxCharacters) . '...';
    }
}

if(!function_exists('currency'))
{
    /**
     * @return string
     */
    function currency()
    {
        $currency = App\Models\Currency::where('activated', true)->first();
        return $currency->symbol;
    }
}