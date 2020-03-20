<?php

namespace camazon\request;

class Base
{
    protected $uri;

    protected $apiParas = [];

    public function getApiParas()
    {
        return $this->apiParas;
    }

    public function getUri()
    {
        return $this->uri;
    }
}