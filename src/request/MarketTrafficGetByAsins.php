<?php

namespace camazon\request;

class MarketTrafficGetByAsins extends Base
{
    protected $uri = '/api/v1/market_traffic/get_by_asins';

    private $_market_id;

    private $_date;

    private $_asins;

    public function setMarketId($id)
    {
        $this->_market_id = $id;
        $this->apiParas['market_id'] = $id;
    }

    public function setAsins($asins)
    {
        $this->_asins = $asins;
        $this->apiParas['asins'] = $asins;
    }

    public function setDate($date)
    {
        $this->_date = $date;
        $this->apiParas['date'] = $date;
    }
}