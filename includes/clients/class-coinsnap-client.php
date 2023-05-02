<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class Coinsnap_Client extends Abstract_Client
{
  private string $websiteId;
  private string $apiKey;
  public function __construct()
  {
    $baseUrl = 'https://app.coinsnap.io';
    $this->websiteId = get_option(btcpw_coinsnap_store_id);
    $this->apiKey = get_option('btcpw_coinsnap_auth_key');
    parent::__construct($baseUrl);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/api/v1/website/' . $this->getWebsiteId() . '/invoices';
    $args = array(
      'headers' => array(
        'Authorization' => $this->getKey(),
        'Content-Type' => 'application/json',
      ),
      'body' => json_encode($data),
      'method' => 'POST',
      'timeout' => 60,
    );
    return wp_remote_request($url, $args);
  }
  public function getInvoice(string $invoiceId)
  {
    $url = $this->getBaseUrl() .  '/api/v1/website/' . $this->getWebsiteId() . '/invoices/' . $invoiceId;
    $args = array(
      'headers' => array(
        'Authorization' => $this->getViewKey(),
        'Content-Type' => 'application/json',
      ),
      'method' => 'GET',
      'timeout' => 30,
    );
    return wp_remote_request($url, $args);
  }
  public function getKey()
  {
    return $this->apiKey;
  }
  public function getWebsiteId()
  {
    return $this->websiteId;
  }
}
