<?php

namespace Modules\Country\Services;

use Modules\Country\Models\Country;

class PopulationCountryService
{

    private const ASIA_POPULATION_CRITERIA = 8000000;

    private const GENERAL_POPULATION_CRITERIA = 5000000;

    private const ASIA_REGION = "Asia";

    public function handle(Country $country): bool
    {
        return $country->region == self::ASIA_REGION
            ?
            $this->asiaPopulationCriteria($country->population)
            :
            $this->generalPopulationCriteria($country->population);
    }

    private function asiaPopulationCriteria(int $population): bool
    {
        return $population >= self::ASIA_POPULATION_CRITERIA;
    }

    private function generalPopulationCriteria(int $population): bool
    {
        return $population >= self::GENERAL_POPULATION_CRITERIA;
    }
}
