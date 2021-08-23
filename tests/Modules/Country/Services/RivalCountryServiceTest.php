<?php

namespace Modules\Country\Services;

use Modules\Country\Models\Country;
use PHPUnit\Framework\TestCase;

class RivalCountryServiceTest extends TestCase
{

    /**
     * @dataProvider provider
     */
    public function testHandle(Country $country, array $response, bool $expected)
    {
        $countryCheckerServiceStub = $this->createStub(CountryCheckerService::class);
        $countryCheckerServiceStub->method('handle')->willReturn($response);

        $rivalCountryService = new RivalCountryService($countryCheckerServiceStub);
        
        $this->assertEquals($expected, $rivalCountryService->handle($country));
    }

    public function provider()
    {
        return [
            [
                'country' => new Country('es', 'Europe', 1000),
                'response' => ['population' => 10000],
                'expect' => false,
            ],
            [
                'country' => new Country('es', 'Europe', 1000),
                'response' => ['population' => 100],
                'expect' => true,
            ],
        ];
    }

}
