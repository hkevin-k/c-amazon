<?php

namespace camazon\request;

class MarketTrafficGetByParentAsin extends Base
{
    protected $uri = '/api/v1/market_traffic/get_by_parent_asin';

    private $_market_id;

    private $_parent_asin;

    private $_start_date;

    private $_end_date;

    public function setMarketId($id)
    {
        $this->_market_id = $id;
        $this->apiParas['market_id'] = $id;
    }

    public function setParentAsin($parent_asin)
    {
        $this->_parent_asin = $parent_asin;
        $this->apiParas['parent_asin'] = $parent_asin;
    }

    public function setStartDate($start_date)
    {
        $this->_start_date = $start_date;
        $this->apiParas['start_date'] = $start_date;
    }

    public function setEndDate($end_date)
    {
        $this->_end_date = $end_date;
        $this->apiParas['end_date'] = $end_date;
    }
}