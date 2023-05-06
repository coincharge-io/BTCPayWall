<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class OpenNode_Client extends Abstract_Client
{
  use FormatJsonTrait;
  private $apiKey;
  public function __construct($settings = [])
  {
    $baseUrl = 'https://api.opennode.com';
    $this->apiKey = get_option('btcpw_opennode_auth_key');
    parent::__construct($baseUrl);
  }
  public function createInvoice(array $data = [])
  {
    $url = $this->getBaseUrl() . '/v1/charges';
    $args = array(
      'headers' => array(
        'Authorization' => $this->getKey(),
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
    $url = $this->getBaseUrl() . '/v1/charge/' . $invoiceId;
    $args = array(
      'headers' => array(
        'Authorization' => $this->getKey(),
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
    return $this->jsonDecode($response)['data'];
  }
}
