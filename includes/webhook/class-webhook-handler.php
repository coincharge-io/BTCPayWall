<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

abstract class WebhookHandler
{
  abstract public function handle($data);
}
