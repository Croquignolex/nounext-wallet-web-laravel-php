@inject('languageService', 'App\Services\LanguageService')

<a class="dropdown-item" href="{{ $languageService->getUrl($language) }}">
    <img src="{{ flag_img_asset($language) }}" alt="...">
    &nbsp;&nbsp;@lang($languageService->getLaguageFullName($language))
</a>