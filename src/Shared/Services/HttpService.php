<?php

namespace Shared\Services;

use Config\CurlConfig;
use Exception;

class HttpService
{
    private const METHOD_GET = 'GET';

    public function __construct(private CurlConfig $curlConfig)
    {
    }


    public function get(string $url, array $query = [], array $headers = [])
    {
        $response = $this->sendRequest(self::METHOD_GET, $url, $query, $headers);

        return json_decode($response, true);
    }

    private function sendRequest(string $method, string $url, array $query, array $headers)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url . (empty($query) ? '' : '?' . http_build_query($query)));
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, $this->curlConfig->freshConnect);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, $this->curlConfig->returnTransfer);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $this->curlConfig->verifySSLHost);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->curlConfig->verifySSLPeer);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->curlConfig->connectTimeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->curlConfig->timeout);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $this->curlConfig->followLocation);
        curl_setopt($ch, CURLOPT_ENCODING, $this->curlConfig->encoding);
        curl_setopt($ch, CURLOPT_MAXREDIRS, $this->curlConfig->maxRedirs);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, $this->curlConfig->httpVersion);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        $response = curl_exec($ch);

        $err = curl_error($ch);

        if ($err) {
            throw new Exception("cURL Error #:" . $err, 1);
        }

        curl_close($ch);

        return $response;
    }
}
