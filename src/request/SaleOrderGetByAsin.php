<?php

namespace camazon\request;

class SaleOrderGetByAsin extends Base
{
    protected $uri = '/api/v1/sale_order/get_by_asin';

    private $_market_id;

    private $_start_date;

    private $_end_date;

    private $_asin;

    public function setMarketId($id)
    {
        $this->_market_id = $id;
        $this->apiParas['market_id'] = $id;
    }

    public function setAsin($asin)
    {
        $this->_asin = $asin;
        $this->apiParas['asin'] = $asin;
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