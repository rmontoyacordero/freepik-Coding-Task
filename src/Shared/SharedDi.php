<?php

namespace Shared;

use Psr\Container\ContainerInterface;
use Shared\Services\HttpService;

return [
    HttpService::class =>function (ContainerInterface $container) {
        return new HttpService($container->get(\Config\CurlConfig::class));
    },
];
