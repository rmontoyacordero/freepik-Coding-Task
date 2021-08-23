<?php

namespace Modules\Country\Models;

class Country
{
    public function __construct(public string $code, public string $region, public int $population)
    {
    }
}
