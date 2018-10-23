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
//        CURLOPT_MAXREDIRS      => 10,
//        CURLOPT_TIMEOUT        => 30000,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => 'GET',
        CURLOPT_POST   => 1,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1,
//        CURLOPT_HTTPHEADER     => [
//            'accept: */*',
//            'accept-language: en-US,en;q=0.8',
//            'Content-Type: application/json',
//        ],
    ];

    private $_curl;

    private function getToken()
    {
//        $tocken2 =  config('api.get_token.url');
//
//        $ch1 = curl_init();
//        curl_setopt($ch1, CURLOPT_URL,$tocken2);
//
//        curl_setopt ($ch1, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt ($ch1, CURLOPT_SSL_VERIFYPEER, 0);
//        curl_setopt($ch1, CURLOPT_POST, 1);
//        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch1, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
//        curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, 'GET');
//
//
//
//        $server_output = curl_exec ($ch1);
//        $errorMsg = curl_error($ch1);
//        $errorNumber = curl_errno($ch1);
//        echo $errorMsg;
//        echo $errorNumber;
//        echo $server_output;exit;

        if ($key = Cache::has(self::API_CACHE_KEY))

            return Cache::get(self::API_CACHE_KEY);

        $curl = curl_init();

        curl_setopt_array($curl, array_merge(static::CURL_OPT, [CURLOPT_URL => config('api.get_token.url')]));

//        dd($curl);

        $resp = json_decode(curl_exec($curl), true);

        dd(curl_error($curl));



        curl_close($curl);

        if ($key = $resp[self::API_GET_TOKEN_RESPONSE_KEY] ?? null)
        {
            Cache::put(self::API_CACHE_KEY, $key, now()->addMinutes(($resp['max_expiry_time'] - time())/60));

            return $key;
        }

        throw new \Exception('Unable to retrieve API auth key.');
    }

    public function getCurl()
    {
        $token = self::getToken();

        $this->_curl = curl_init();

        curl_setopt($this->_curl, CURLOPT_HTTPHEADER, [static::API_KEY => $token]);

        return $this->_curl;
    }

    public function curlGet(string $url, array $data = [])
    {
        $this->getCurl();

        curl_setopt_array($this->_curl, array_merge(static::CURL_OPT, [
            CURLOPT_URL => sizeof($data) ? $url . '?' . http_build_query($data) : $url
        ]));

        $resp = curl_exec($this->_curl);

        $err = curl_error($this->_curl);

        curl_close($this->_curl);

        return $resp;
    }

    public function curlPost(string $url, array $data = [])
    {
        $this->getCurl();

        curl_setopt_array($this->_curl, array_merge(static::CURL_OPT, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => sizeof($data) ? json_encode($data) : null
        ]));

        $resp = curl_exec($this->getCurl());

        $err = curl_error($this->_curl);

        curl_close($this->_curl);

        return $resp;
    }
}
