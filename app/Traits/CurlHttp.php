<?php

namespace App\Traits;

trait CurlHttp
{
    protected function makeRequest(string $url, $data, array $headers, string $method = 'get')
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        if(!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $this->compileRequestHeaders($headers));
        }

        curl_setopt($curl, CURLOPT_VERBOSE, false);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_setopt( $curl, CURLOPT_HEADER, TRUE);

        if(!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($curl);
        
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $body = substr($response, $headerSize);

        $response = json_decode($body, true);

        curl_close($curl);

        return $response;
    }

    /**
     * @param array $headers
     * @return array
     */
    private function compileRequestHeaders(array $headers)
    {
        $return = [];

        foreach ($headers as $key => $value) {
            $return[] = $key . ': ' . $value;
        }

        return $return;
    }

    protected function getToken()
    {
        $data = [
            'username' => 'support@netbox.az',
            'password' => '1993hafizatz'
        ];
        
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $result = $this->makeRequest(config('neo.main_url').'member/auth/login', $data, $headers, 'POST');
        
        return isset($result['data']['access_token']) ? $result['data']['access_token'] : '';
    }
}