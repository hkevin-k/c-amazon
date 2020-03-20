<?php

namespace camazon\request;

class SaleOrderGetByOrderIds extends Base
{
    protected $uri = '/api/v1/sale_order/get_by_order_ids';

    private $_order_ids;

    /**
     * @param $order_ids 数组的json格式
     */
    public function setOrderIds($order_ids)
    {
        $this->_order_ids = $order_ids;
        $this->apiParas['order_ids'] = $order_ids;
    }
}