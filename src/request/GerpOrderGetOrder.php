<?php

namespace camazon\request;

/**
 * 请求gerp接口查询订单信息
 * @package camazon\request
 */
class GerpOrderGetOrder extends Base
{
    protected $uri = '/api/v1/gerp-order/get-order';

    private $_order_id;

    private $_seller_order_id;

    /**
     * @param string
     */
    public function setOrderId($order_id)
    {
        $this->_order_id = $order_id;
        $this->apiParas['order_id'] = $order_id;
    }

    /**
     * @param string
     */
    public function setSellerOrderId($seller_order_id)
    {
        $this->_seller_order_id = $seller_order_id;
        $this->apiParas['seller_order_id'] = $seller_order_id;
    }
}