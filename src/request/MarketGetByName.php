<?php

namespace camazon\request;

class MarketGetByName extends Base
{
    protected $uri = '/api/v1/market/get_by_name';

    private $_market_name;

    private $_name;

    public function setMarketName($market_name)
    {
        $this->_market_name = $market_name;
        $this->apiParas['market_name'] = $market_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
        $this->apiParas['name'] = $name;
    }
}