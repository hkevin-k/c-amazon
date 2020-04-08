<?php

namespace camazon;

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

            switch (curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
                case 200:
                    return json_decode($response, true);
                    break;
                case 401:
                    return [
                        'errorcode' => 401,
                        'errmsg' => '认证失败',
                        'data' => []
                    ];
                case 500:
                    return [
                        'errorcode' => 500,
                        'errmsg' => '服务器错误',
                        'data' => []
                    ];
                    break;
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