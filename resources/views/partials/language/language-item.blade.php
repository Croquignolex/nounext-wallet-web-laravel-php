@inject('languageService', 'App\Services\LanguageService')
<li><a href="{{ $languageService->getUrl($language) }}">@lang($languageService->getLaguageFullName($language))</a></li> 