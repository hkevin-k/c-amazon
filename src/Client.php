<?php

namespace camazon;

/**
 *
 */
class Client
{
    private $_access_token;

    private $_request_domain;

    public function __construct($request_domain, $access_token)
    {
        $this->setAccessToken($access_token);
        $this->setRequestDomain($request_domain);
    }

    public function setAccessToken($access_token)
    {
        $this->_access_token = $access_token;
    }

    public function setRequestDomain($request_domain)
    {
        $this->_request_domain = $request_domain;
    }

    public function request($request)
    {
        try {
            $url = $this->_request_domain . $request->getUri();

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36',
                'X-ACCESS-TOKEN: '.$this->_access_token
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);

            $api_params = $request->getApiParas();
            if (!empty($api_params) && is_array($api_params)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_params));
            }
            $response = curl_exec($ch);

            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($http_code === 200) {
                $response = json_decode($response, true);
                return empty($response) ? [
                    'errorcode' => 10003,
                    'errmsg' => 'Json解析问题',
                    'data' => []
                ] : $response;
            } else {
                return [
                    'errorcode' => 10002,
                    'errmsg' => 'Http Code: '.$http_code.'; Message: '.curl_error($ch),
                    'data' => []
                ];
            }
        } catch (\Exception $e) {
            return [
                'errorcode' => 10001,
                'errmsg' => 'ERROR '.$e->getMessage(),
                'data' => []
            ];
        }
    }
}