<?php

namespace camazon\request;

class SaleOrderGetByOrderIds extends Base
{
    protected $uri = '/api/v1/sale_order/get_by_order_ids';

    private $_order_ids;

    private $_market_ids;

    /**
     * @param $order_ids 数组的json格式
     */
    public function setOrderIds($order_ids)
    {
        $this->_order_ids = $order_ids;
        $this->apiParas['order_ids'] = $order_ids;
    }

    /**
     * 可选
     * @param $market_ids 数组的json格式
     */
    public function setMarketIds($market_ids)
    {
        if (!empty($market_ids)) {
            $this->_market_ids = $market_ids;
            $this->apiParas['market_ids'] = $market_ids;
        }
    }
}