<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


abstract class Abstract_Client
{
    private $baseUrl;
    private $apiKey;

    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
    public function getApiKey()
    {
        return $this->apiKey;
    }
    abstract protected function formatResponse($response);
}
