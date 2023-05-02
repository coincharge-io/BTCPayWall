<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

class CoinsnapWebhookHandler extends WebhookHandler
{
  public function handle($data)
  {
    //Check secret
    $data = file_get_contents("php://input"); // Get the raw POST data
    $payload = json_decode($data, true);
    switch ($payload->status) {
      case 'New':
        break;

      case 'Pending': // The invoice is paid in full.
        break;

      case 'Paid':
        break;

      case 'Expired':
        break;

      case 'Underpaid':
        break;

      case 'Overpaid':
        break;
    }
  }
}
