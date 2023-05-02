<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class OpenNode_Client extends Abstract_Client
{
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
      'json' => $data,
      'method' => 'POST',
      'timeout' => 60,
    );
    return wp_remote_request($url, $args);
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
    return wp_remote_request($url, $args);
  }
  public function getKey()
  {
    return $this->apiKey;
  }
}
