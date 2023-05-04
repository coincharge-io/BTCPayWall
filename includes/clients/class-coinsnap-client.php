<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class Coinsnap_Client extends Abstract_Client
{
  use FormatJsonTrait;
  private string $websiteId;
  private string $apiKey;
  public function __construct()
  {
    //$baseUrl = 'https://app.coinsnap.io';
    $baseUrl = 'https://a5f1-93-87-234-2.ngrok-free.app';
    $this->websiteId = get_option(btcpw_coinsnap_website_id);
    $this->apiKey = get_option('btcpw_coinsnap_auth_key');
    parent::__construct($baseUrl);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/api/v1/websites/' . $this->getWebsiteId() . '/invoices';
    $args = array(
      'headers' => array(
        'X-Api-Key' =>  $this->getKey(),
        'Content-Type' => 'application/json',
      ),
      'body' => json_encode($data),
      'method' => 'POST',
      'timeout' => 60,
    );
    $response = wp_remote_request($url, $args);
    if (is_wp_error($response)) {
      throw new Gateway_Exception($response['response']['message'], $response['response']['code']);
    }
    return $this->formatResponse($response['body']);
  }
  public function getInvoice(string $invoiceId)
  {
    $url = $this->getBaseUrl() .  '/api/v1/websites/' . $this->getWebsiteId() . '/invoices/' . $invoiceId;
    $args = array(
      'headers' => array(
        'X-Api-Key' =>  $this->getKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 30,
    );
    $response = wp_remote_request($url, $args);
    if (is_wp_error($response)) {
      throw new Gateway_Exception($response['response']['message'], $response['response']['code']);
    }
    return $this->formatResponse($response['body']);
  }
  public function getKey()
  {
    return $this->apiKey;
  }
  public function getWebsiteId()
  {
    return $this->websiteId;
  }
  protected function formatResponse($response)
  {
    return $this->jsonDecode($response);
  }
}
