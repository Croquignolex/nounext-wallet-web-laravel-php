@inject('languageService', 'App\Services\LanguageService')
<a class="dropdown-item" href="{{ $languageService->getUrl($language) }}">@lang($languageService->getLaguageFullName($language))</a>