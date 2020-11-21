<?php

namespace camazon\request;

class SaleOrderGetByOrderId extends Base
{
    protected $uri = '/api/v1/sale_order/get_by_order_id';

    private $_order_id;

    private $_market_ids;

    /**
     * @param $order_ids 数组的json格式
     */
    public function setOrderId($order_id)
    {
        $this->_order_id = $order_id;
        $this->apiParas['order_id'] = $order_id;
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