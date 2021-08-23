<?php

return [
    'curlConfig' => [
        'freshConnect' => true,
        'returnTransfer' => true,
        'verifySSLHost' => false,
        'verifySSLPeer' => false,
        'connectTimeout' => false,
        'timeout' => 30,
        'followLocation' => true,
        'encoding' => '',
        'maxRedirs' => 10,
        'httpVersion' => CURL_HTTP_VERSION_1_1,
    ],
    'countryCheckerConfig' => [
        'endpoint' => 'https://restcountries-v1.p.rapidapi.com/alpha/',
        'headers' => [
            'x-rapidapi-host: restcountries-v1.p.rapidapi.com',
            'x-rapidapi-key: 2dfaff8260msh71e2602d2fdd8e0p14307djsn8de366b0a61c'
        ]
    ]
];
