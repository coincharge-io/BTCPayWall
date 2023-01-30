<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


class BTCPayWall_Abstract_Client
{
    private $baseUrl;
    private $httpClient;
    private $apiKey;

    public function __construct($baseUrl)
    {
        $this->httpClient = new WP_Http();
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
