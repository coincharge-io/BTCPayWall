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
        $baseUrl = 'https://app.coinsnap.io';
        $this->storeId = get_option('btcpw_coinsnap_store_id');
        $this->apiKey = get_option('btcpw_coinsnap_auth_key');
        parent::__construct($baseUrl);
    }
    public function createInvoice(array $data = [])
    {
        $url = $this->getBaseUrl() . '/api/v1/stores/' . $this->getStoreId() . '/invoices';
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
            throw new Gateway_Exception($response->get_error_message(), $response->get_error_code());
        }
        return $this->formatResponse($response['body']);
    }
    public function getInvoice(string $invoiceId)
    {
        $url = $this->getBaseUrl() .  '/api/v1/stores/' . $this->getStoreId() . '/invoices/' . $invoiceId;
        $args = array(
            'headers' => array(
                'X-Api-Key' =>  $this->getKey(),
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
    public function getStoreId()
    {
        return $this->storeId;
    }
    protected function formatResponse($response)
    {
        return $this->jsonDecode($response);
    }
}
