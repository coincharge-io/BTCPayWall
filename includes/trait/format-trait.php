<?php



// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

trait FormatJsonTrait
{
  public function jsonDecode($jsonString)
  {
    $result = json_decode($jsonString, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
      return false;
      //throw new Error("Server response can not be decoded.");
    }
    return $result;
  }
}
