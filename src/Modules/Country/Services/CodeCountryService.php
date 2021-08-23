<?php

namespace Modules\Country\Services;

use Modules\Country\Models\Country;

class CodeCountryService
{

    private const VOWELS = ['a', 'e', 'i', 'o', 'u'];

    public function handle(Country $country): bool
    {
        return $this->isVowelFirstLetter($country->code);
    }

    private function isVowelFirstLetter(string $countryCode): bool
    {
        return in_array(strtolower($countryCode[0]), self::VOWELS);
    }

}
