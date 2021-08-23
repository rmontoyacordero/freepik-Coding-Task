<?php

namespace Modules\Country\Controllers;

use Modules\Country\Models\Country;
use Modules\Country\Services\CodeCountryService;
use Modules\Country\Services\CountryCheckerService;
use Modules\Country\Services\PopulationCountryService;
use Modules\Country\Services\RegionCountryService;
use Modules\Country\Services\RivalCountryService;

class CountryCheckerController
{

    public function __construct(
        private CodeCountryService $codeCountryService,
        private CountryCheckerService $countryCheckerService,
        private PopulationCountryService $populationCountryService,
        private RivalCountryService $rivalCountryService,
        private RegionCountryService $regionCountryService
    )
    {
    }

    public function handle(string $countryCode): array
    {
        ['population' => $population, 'region' => $region] = $this->countryCheckerService->handle($countryCode);

        $country = new Country($countryCode, $region, $population);

        $criteria = [
            "code" => $this->codeCountryService->handle($country),
            "region" => $this->regionCountryService->handle($country),
            "population" => $this->populationCountryService->handle($country),
            "rival" => $this->rivalCountryService->handle($country),
        ];

        return [
            "result" => !in_array(false, $criteria),
            "criteria" => $criteria,
        ];
    }
}
