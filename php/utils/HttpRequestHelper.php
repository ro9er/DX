<?php
/**
 * 完成http请求的一些处理，如获取post、get参数等
 */

class HttpRequestHelper {
  /**
   * Get the parameter from $_GET
   * @param string $key
   * @param mixed $default_value
   * @return NULL or mixed
   */
  public static function GetParam($key, $default_value = NULL) {
    return isset($_GET[$key]) ? $_GET[$key]: $default_value;
  }

  /**
   * Get the parameter from $_POST
   * @param string $key
   * @param mixed $default_value
   * @return NULL or mixed
   */
  public static function PostParam($key, $default_value = NULL) {
    return isset($_POST[$key]) ? $_POST[$key]: $default_value;
  }


  /* Get the parameter from $_POST, $_GET
   * param string $key
   * param mixed $default_value
   * return NULL or mixed
   */
  public static function RequestParam($key, $default_value = NULL) {
    return isset($_REQUEST[$key]) ? $_REQUEST[$key]: $default_value;
  }
}

