<?php

namespace Src\Backend\Application\Traits;

trait AcceptLanguage
{
    protected const PATTERN = '/^([a-zA-Z]{2,3})(?:-[a-zA-Z]{2})?;?q=([0-9](?:\.[0-9])?)?$/';

    function localeByFactorWeighting(string $acceptLanguage) : string
    {
        $locales = [];
        $languages = explode(',', $acceptLanguage);
        foreach ($languages as $language) {
            if (preg_match(self::PATTERN, $language, $matches)) {
                $locale = $matches[1];
                $factorWeighting = isset($matches[2]) ? (float) $matches[2] : 0;
                $locales[$locale] = $factorWeighting;
            }
        }
        if (!empty($locales)) {
            arsort($locales);
            return key($locales);
        }
        return config('app.locale');
    }

    protected function isSupportedLocale(string $locale) : bool
    {
        return in_array($locale, config('app.supported_locales'));
    }
}

