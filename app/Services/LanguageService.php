<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class LanguageService
{
    private $languageList;
    private $currentLanguage;

    /**
     * LanguageService constructor.
     */
    public function __construct()
    {
        $this->languageList = config('app.locale_list');
        $this->currentLanguage = App::getLocale();
    }

    /**
     * @param $language
     * @return mixed|string
     */
    public function getUrl($language)
    {
        $fullUrl = url()->full();

        if(!str_contains($fullUrl, $language))
        {
            $fullUrl = $this->manage($fullUrl, $language);
        }

        return $fullUrl;
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        $languages = [];

        foreach ($this->languageList as $lang)
        {
            if($lang != $this->currentLanguage)
            {
                $languages[] = $lang;
            }
        }

        return $languages;
    }

    /**
     * @param $language
     * @return string
     */
    public function getLaguageFullName($language)
    {
        switch($language)
        {
            case 'fr': $laguageFullNameReturn = 'general.french';
                break;
            case 'en': $laguageFullNameReturn = 'general.english';
                break;
            default:
                $laguageFullNameReturn = 'general.unknown';
                break;
        }

        return $laguageFullNameReturn;
    }

    /**
     * @return string
     */
    public function getCurrentLanguage()
    {
        return $this->currentLanguage;
    }

    /**
     * @return string
     */
    public function getCurrentLanguageFullName()
    {
        return $this->getLaguageFullName($this->currentLanguage);
    }

    /**
     * @param $fullUrl
     * @param $language
     * @return mixed|string
     */
    private function manage($fullUrl, $language)
    {
        if(in_array($language, $this->languageList))
        {
            foreach ($this->languageList as $lang)
            {
                if(str_contains($fullUrl, $lang))
                    return str_replace($lang, $language, $fullUrl);
            }
        }

        $url = config('app.url');
        return str_replace_first($url, $url . '/' . $language, $fullUrl);
    }
}