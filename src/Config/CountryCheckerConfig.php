<?php

namespace Config;

class CountryCheckerConfig
{
    public string $endpoint;

    public array $headers;

    public function __construct(array $config)
    {
        $this->endpoint = $config['endpoint'];
        $this->headers = $config['headers'];
    }

}
