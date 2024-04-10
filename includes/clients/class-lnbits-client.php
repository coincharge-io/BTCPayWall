<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class LNBits_Client extends Abstract_Client
{
  use FormatJsonTrait;
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
  public function getInvoice(string $paymentHash)
  {
    $url = $this->getBaseUrl() .  '/api/v1/payments/' . $paymentHash;
    $args = array(
      'headers' => array(
        'X-Api-Key' => $this->getKey(),
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
  public function getKey()
  {
    return $this->apiKey;
  }
  protected function formatResponse($response)
  {
    return $this->jsonDecode($response);
  }
}
