<?php
class Alert
{
  public static function notification($args = [])
  {
    $_SESSION[$args['status']] = $args['message'];
    header("location:?c={$args['location']}");
    exit;
  }
}
