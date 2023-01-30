<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class BTCPayWall_OpenNode_Client extends BTCPayWall_Abstract_Client
{
  private $apiKey;
  public function __construct($settings = [])
  {
    $this->baseUrl = 'https://api.opennode.com';
    $this->apiKey = $settings['apiKey'];
    parent::__construct($this->baseUrl);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/v1/charges';
    $args = array(
      'headers' => array(
        'Authorization' => $this->getKey(),
        'Content-Type' => 'application/json',
      ),
      'json' => $data,
      'method' => 'POST',
      'timeout' => 60,
    );
    return $this->httpClient->request($url, $args);
  }
  public function getInvoice(string $invoiceId)
  {
    $url = $this->getBaseUrl() . '/v1/charge/' . $invoiceId;
    $args = array(
      'headers' => array(
        'Authorization' => $this->getKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 30,
    );
    return $this->httpClient->request($url, $args);
  }
  public function getKey()
  {
    return $this->apiKey;
  }
}
