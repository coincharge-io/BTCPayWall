<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}


class Gateway_Exception extends Exception
{
  public function __construct($message, $code = 0, Throwable $previous = null)
  {
    parent::__construct($message, $code, $previous);
  }
  public function __toString()
  {
    return __CLASS__ . "{$this->message} ocurred with code: {$this->code}";
  }
}
