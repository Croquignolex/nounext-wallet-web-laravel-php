@inject('languageService', 'App\Services\LanguageService')

<div class="dropdown {{ $style ?? '' }}">
    <button class="btn btn-light dropdown-toggle" id="languages" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="oi oi-flag"></span>
        &nbsp;&nbsp;@lang($languageService->getCurrentLanguageFullName())
    </button>
    <div class="dropdown-menu" aria-labelledby="languages">
        <div class="dropdown-header font-weight-bold">@lang('general.languages')</div>
        @each('partials.language.language-item', $languageService->getLanguages(), 'language')
    </div>
</div>