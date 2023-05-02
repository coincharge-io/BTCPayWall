<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class Abstract_Client
{
    private $baseUrl;
    private $httpClient;
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
}
