<?php

use Config\CountryCheckerConfig;
use Config\CurlConfig;
use Psr\Container\ContainerInterface;

return [
    CurlConfig::class => function (ContainerInterface $container) {
        return new CurlConfig($container->get('curlConfig'));
    },
    CountryCheckerConfig::class =>function (ContainerInterface $container) {
        return new CountryCheckerConfig($container->get('countryCheckerConfig'));
    },
];
