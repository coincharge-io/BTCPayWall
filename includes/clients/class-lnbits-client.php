<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class LNBits_Client extends Abstract_Client
{
  private string $apiKey;
  public function __construct($settings = [])
  {
    $baseUrl = get_option('btcpw_lnbits_server_url');
    $this->apiKey = get_option('btcpw_lnbits_auth_key');
    parent::__construct($baseUrl);
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
    return wp_remote_request($url, $args);
  }
  public function getInvoice(string $paymentHash)
  {
    $url = $this->getBaseUrl() .  '/api/v1/payments/' . $paymentHash;
    $args = array(
      'headers' => array(
        'X-Api-Key' => $this->getKey(),
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
}
