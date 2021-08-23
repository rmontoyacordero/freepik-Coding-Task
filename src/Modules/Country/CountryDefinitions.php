<?php

use Modules\Country\Controllers\CountryCheckerController;
use Modules\Country\Services\CodeCountryService;
use Modules\Country\Services\CountryCheckerService;
use Modules\Country\Services\PopulationCountryService;
use Modules\Country\Services\RegionCountryService;
use Modules\Country\Services\RivalCountryService;
use function DI\autowire;

return [
    CountryCheckerController::class => autowire(),
    CodeCountryService::class => autowire(),
    CountryCheckerService::class => autowire(),
    PopulationCountryService::class => autowire(),
    RegionCountryService::class => autowire(),
    RivalCountryService::class => autowire(),
];
