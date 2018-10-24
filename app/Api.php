<?php

namespace App;

use Illuminate\Support\Facades\Cache;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    const API_KEY = 'etm-auth-key';

    const API_GET_TOKEN_RESPONSE_KEY = 'etm_auth_key';

    const API_CACHE_KEY = 'api_key';

    const CURL_OPT = [
        CURLOPT_URL            => '',
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30000,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => 'GET',
        CURLOPT_POST           => 1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1,
        CURLOPT_HTTPHEADER     => [
            'accept: */*',
            'accept-language: en-US,en;q=0.8',
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS     => ''
    ];

    private $_curl;

    private $_authUrl;

    public function setAuthUrl(string $url)
    {
        $this->_authUrl = $url;

        return $this;
    }

    public function setToken()
    {
        $this->fetchCurl();

        $this->_setCurlOptions([CURLOPT_URL => $this->_authUrl]);

        $resp = json_decode(curl_exec($this->_curl), true);

        curl_close($this->_curl);

        if ($key = $resp[self::API_GET_TOKEN_RESPONSE_KEY] ?? null)

            Cache::put(self::API_CACHE_KEY, $key, now()->addMinutes(($resp['max_expiry_time'] - time()) / 60));

        else throw new \Exception('Unable to retrieve API auth key.');

        return $this;
    }

    public function getToken()
    {
        return Cache::get(self::API_CACHE_KEY);
    }

    public function checkToken()
    {
        $this->getToken() or $this->setToken();

        return $this;
    }

    /**
     * @param array $options
     */
    private function _setCurlOptions(array $options)
    {
        foreach (static::CURL_OPT as $k => $v)
        {
            if (isset($options[$k]))

                $v = $options[$k];

            if ($k === CURLOPT_HTTPHEADER)

                $v[] = sprintf('%s:%s', static::API_KEY, $this->getToken());

            curl_setopt($this->_curl, $k, $v);
        }
    }

    public function fetchCurl()
    {
        return $this->_curl = curl_init();
    }

    public function getCurl()
    {
        return $this->_curl;
    }

    public function curlGet(string $url, array $data = [])
    {
        $this->fetchCurl();

//        dd( $url . '?' . http_build_query($data), $this->getToken());

        $this->_setCurlOptions([CURLOPT_URL => sizeof($data) ? $url . '?' . http_build_query($data) : $url]);

        $resp = curl_exec($this->_curl);

        $err = curl_error($this->_curl);

        curl_close($this->_curl);

        return json_decode($resp, true);
    }

    public function curlPost(string $url, array $data = [])
    {
        $this->fetchCurl();

        $this->_setCurlOptions([
            CURLOPT_URL           => $url,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS    => json_encode($data)
        ]);

        $resp = curl_exec($this->_curl);

        $err = curl_error($this->_curl);

        curl_close($this->_curl);

        return json_decode($resp, true);
    }
}
