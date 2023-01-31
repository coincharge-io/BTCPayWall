<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class BTCPayWall_BTCPay_Client extends BTCPayWall_Abstract_Client
{
  private string $storeId;
  private string $apiKeyView;
  private string $apiKeyCreate;
  public function __construct($settings = [])
  {
    $this->storeId = $settings['storeId'];
    $this->apiKeyView = $settings['apiKeyView'];
    $this->apiKeyCreate = $settings['apiKeyCreate'];
    parent::__construct($settings['baseUrl']);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/api/v1/stores/' . $this->getStoreId() . '/invoices';
    $args = array(
      'headers' => array(
        'Authorization' => $this->getCreateKey(),
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
    $url = $this->getBaseUrl() .  '/api/v1/stores/' . $this->getStoreId() . '/invoices/' . $invoiceId;
    $args = array(
      'headers' => array(
        'Authorization' => $this->getViewKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 30,
    );
    return $this->httpClient->request($url, $args);
  }
  public function getPaymentMethod()
  {
    $url = $this->getBaseUrl() .  '/api/v1/stores/' . $this->getStoreId() . '/invoices/' . $invoiceId . '/payment-methods';
    $args = array(
      'headers' => array(
        'Authorization' => $this->getViewKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 30,
    );
    return $this->httpClient->request($url, $args);
  }
  public function getCreateKey()
  {
    return $this->apiKeyCreate;
  }
  public function getViewKey()
  {
    return $this->apiKeyView;
  }
  public function getStoreId()
  {
    return $this->storeId;
  }
}
