@inject('languageService', 'App\Services\LanguageService')

<div class="lang">
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" id="languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
      <em class="fa fa-flag"></em> @lang($languageService->getCurrentLanguageFullName())
        <span class="caret"></span>
      </button>
      <ul class="dropdown-menu" aria-labelledby="languages">
        <strong class="dropdown-header">@lang('general.languages')</strong>
        @each('partials.language.language-item', $languageService->getLanguages(), 'language')
      </ul>
    </div> 
</div>