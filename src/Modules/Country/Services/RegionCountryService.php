<?php

namespace Modules\Country\Services;

use Modules\Country\Models\Country;

class RegionCountryService
{

    private const EUROPE_REGION = 'Europe';

    public function handle(Country $country): bool
    {
        return $country->region == self::EUROPE_REGION;
    }
}
