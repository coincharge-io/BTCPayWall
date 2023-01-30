<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class BTCPayWall_LNBits_Client extends BTCPayWall_Abstract_Client
{
  private string $apiKey;
  public function __construct($settings = [])
  {
    $this->apiKey = $settings['apiKey'];
    parent::__construct($settings['baseUrl']);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/api/v1/payments';
    $args = array(
      'headers' => array(
        'X-Api-Key' => $this->getKey(),
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
    $url = $this->getBaseUrl() .  '/api/v1/payments/decode';
    $args = array(
      'headers' => array(
        'X-Api-Key' => $this->getKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'POST',
      'body' => array(
        'invoice' => $invoiceId
      ),
      'timeout' => 30,
    );
    return $this->httpClient->request($url, $args);
  }
  public function getKey()
  {
    return $this->apiKey;
  }
}
