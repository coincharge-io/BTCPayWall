<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


abstract class Abstract_Client
{
    private $baseUrl;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
    abstract protected function formatResponse($response);
}
