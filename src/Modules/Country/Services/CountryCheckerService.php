<?php

namespace Modules\Country\Services;

use Config\CountryCheckerConfig;
use Shared\Services\HttpService;

class CountryCheckerService
{

    public function __construct(private HttpService $httpService, private CountryCheckerConfig $countryCheckerConfig) { }

    public function handle(string $countryCode)
    {
        return $this->httpService->get($this->countryCheckerConfig->endpoint, ['codes' => $countryCode], $this->countryCheckerConfig->headers)[0];
    }

}
