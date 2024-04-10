<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class BTCPay_Client extends Abstract_Client
{
  use FormatJsonTrait;
  private string $storeId;
  private string $apiKeyView;
  private string $apiKeyCreate;
  public function __construct()
  {
    $baseUrl = get_option('btcpw_btcpay_server_url');
    $this->storeId = get_option('btcpw_btcpay_store_id');
    $this->apiKeyView = get_option('btcpw_btcpay_auth_key_view');
    $this->apiKeyCreate = get_option('btcpw_btcpay_auth_key_create');
    parent::__construct($baseUrl);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/api/v1/stores/' . $this->getStoreId() . '/invoices';
    $args = array(
      'headers' => array(
        'Authorization' => 'token ' . $this->getCreateKey(),
        'Content-Type' => 'application/json',
      ),
      'body' => json_encode($data),
      'method' => 'POST',
      'timeout' => 60,
    );
    $response = wp_remote_request($url, $args);
    if (is_wp_error($response)) {
      throw new Gateway_Exception($response->get_error_message(), $response->get_error_code());
    }
    return $this->formatResponse($response['body']);
  }
  public function getInvoice(string $invoiceId)
  {
    $url = $this->getBaseUrl() .  '/api/v1/stores/' . $this->getStoreId() . '/invoices/' . $invoiceId;
    $args = array(
      'headers' => array(
        'Authorization' => 'token ' . $this->getViewKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 60,
    );
    $response = wp_remote_request($url, $args);
    if (is_wp_error($response)) {
      throw new Gateway_Exception($response->get_error_message(), $response->get_error_code());
    }
    return $this->formatResponse($response['body']);
  }
  public function getPaymentMethod()
  {
    $url = $this->getBaseUrl() .  '/api/v1/stores/' . $this->getStoreId() . '/invoices/' . $invoiceId . '/payment-methods';
    $args = array(
      'headers' => array(
        'Authorization' => 'token ' . $this->getViewKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 60,
    );
    $response = wp_remote_request($url, $args);
    if (is_wp_error($response)) {
      throw new Gateway_Exception($response->get_error_message(), $response->get_error_code());
    }
    return $this->formatResponse($response['body']);
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
  protected function formatResponse($response)
  {
    return $this->jsonDecode($response);
  }
}
