<?php

function readable_money(float | int | string $money, string $currency = 'EUR', string $locale = null)
{
    if (! $locale) {
        $locale = lit()->getLocale();
    }

    $numberFormatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);

    return $numberFormatter->formatCurrency((float) $money, $currency);
}
