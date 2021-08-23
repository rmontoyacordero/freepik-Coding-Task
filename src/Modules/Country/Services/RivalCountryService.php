<?php

namespace Modules\Country\Services;

use Modules\Country\Models\Country;

class RivalCountryService
{

    private const RIVAL_CODE = 'NO';

    public function __construct(private CountryCheckerService $countryCheckerService) { }

    public function handle(Country $country): bool
    {
        $response = $this->countryCheckerService->handle(self::RIVAL_CODE);

        return $response['population'] < $country->population;
    }

}
