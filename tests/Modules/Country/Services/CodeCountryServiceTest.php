<?php

namespace Modules\Country\Services;

use Modules\Country\Models\Country;
use PHPUnit\Framework\TestCase;

class CodeCountryServiceTest extends TestCase
{

    /**
     * @dataProvider provider
     */
    public function testHandle(Country $country, bool $expected)
    {
        $codeCountryService = new CodeCountryService();

        $this->assertEquals($expected, $codeCountryService->handle($country));
    }

    public function provider()
    {
        return [
            [
                'country' => new Country('es', 'Europe', 1000),
                'expect' => true,
            ],
            [
                'country' => new Country('de', 'Europe', 100000),
                'expect' => false,
            ],
            [
                'country' => new Country('fr', 'Europe', 1000000),
                'expect' => false,
            ],
            [
                'country' => new Country('no', 'Europe', 10000000),
                'expect' => false,
            ],
            [
                'country' => new Country('pt', 'Europe', 10000000),
                'expect' => false,
            ],
            [
                'country' => new Country('ès', 'Europe', 10000000),
                'expect' => false,
            ],
        ];
    }

}
