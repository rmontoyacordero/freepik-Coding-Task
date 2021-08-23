<?php

namespace Config;

final class CurlConfig
{
    public bool $freshConnect;

    public bool $returnTransfer;

    public int $verifySSLHost;

    public bool $verifySSLPeer;

    public bool $connectTimeout;

    public bool $timeout;

    public bool $followLocation;

    public string $encoding;

    public int $maxRedirs;

    public int $httpVersion;

    public function __construct(array $curlConfig)
    {
        $this->freshConnect = $curlConfig['freshConnect'];
        $this->returnTransfer = $curlConfig['returnTransfer'];
        $this->verifySSLHost = $curlConfig['verifySSLHost'];
        $this->verifySSLPeer = $curlConfig['verifySSLPeer'];
        $this->connectTimeout = $curlConfig['connectTimeout'];
        $this->timeout = $curlConfig['timeout'];
        $this->followLocation = $curlConfig['followLocation'];
        $this->encoding = $curlConfig['encoding'];
        $this->maxRedirs = $curlConfig['maxRedirs'];
        $this->httpVersion = $curlConfig['httpVersion'];
    }
}
