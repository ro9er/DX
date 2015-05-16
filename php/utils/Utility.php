<?php
/*
 * creator: maigohuang
 * */
class Utility
{
  private static $error_msg = '';
  private static $error_no = 0;

  public static function GetError()
  {
    return array(
      'error_msg' => self::$error_msg,
      'error_no' => self::$error_no
      );
  }

  private static function ClearError()
  {
    self::$error_msg = '';
    self::$error_no = 0;
  }

  public static function ObjectToArray($object)
  {
    self::ClearError();
    if (is_object($object))
      $object = get_object_vars($object);
    else if (is_array($object))
      return array_map(array(__CLASS__, __FUNCTION__), $object);
    return $object;
  }

  public static function GetSessionID()
  {
    self::ClearError();
    $raw_id = date('YmdHis').str_pad(rand()%100000, 5, '0', STR_PAD_LEFT);
    return md5($raw_id);
  }

  public static function GetMicroTime()
  {
    self::ClearError();
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
  }

  public static function ArrayToXMLString($key, $arr)
  {
    self::ClearError();
    $keys = array_keys($arr);
    if (is_string($keys[0]))
    {
      $return = "<$key>";
      foreach ($arr as $k => $v)
      {
        if (is_array($v))
        {
          $return .= self::ArrayToXMLString($k, $v);
        }
        else
        {
          $return .= "<$k>$v</$k>";
        }
      }
      $return .= "</$key>";
      return $return;
    }
    else
    {
      $return = '';
      foreach ($arr as $v)
      {
        if (is_array($v))
        {
          $return .= self::ArrayToXMLString($key, $v);
        }
        else
        {
          $return .="<$key>$v</$key>";
        }
      }
      return $return;
    }
  }
}
