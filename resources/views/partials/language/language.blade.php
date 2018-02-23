@inject('languageService', 'App\Services\LanguageService')

<div class="dropdown {{ $style ?? '' }}">
    <button class="btn dropdown-toggle app-main-dropdown" id="languages" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <img src="{{ flag_img_asset($languageService->getCurrentLanguage()) }}" alt="...">
        &nbsp;&nbsp;@lang($languageService->getCurrentLanguageFullName())
    </button>
    <div class="dropdown-menu" aria-labelledby="languages">
        <div class="dropdown-header font-weight-bold app-main-color">@lang('general.languages')</div>
        @each('partials.language.language-item', $languageService->getLanguages(), 'language')
    </div>
</div>

{{
     /*
     * TODO: Fix language dropdow for mobile
     */
}}