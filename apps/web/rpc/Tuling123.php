<?php
/*
 * creator: maigohuang
 * */
namespace rpc;
class Tuling123
{
  private static $error_no = 0;
  private static $error_msg = '';
  const KEY = '9e99148c00ae2f8f26eadf4afbe8c293';
  const API = 'http://www.tuling123.com/openapi/api';

  private static $client = NULL;

  private static function ClearError()
  {
    self::$error_msg = '';
    self::$error_no = 0;
  }

  private static function GetClient()
  {
    if (self::$client == NULL)
    {
      self::$client = new \HttpHandlerCurl();
    }
    return self::$client;
  }

  private static function TransResult($result)
  {
    \Log::info(json_encode($result));
    if ($result == null)
    {
      return false;
    }
    return $result;
  }

  public static function Talk($info, $user)
  {
    self::ClearError();
    $client = self::GetClient();

    $params['key'] = self::KEY;
    $url = "http://www.tuling123.com/openapi/api?key=9e99148c00ae2f8f26eadf4afbe8c293&info=$info&userid=$user";
    \Log::info($url);

    $data = $client->get($url);
    return self::TransResult(json_decode($data, true));
  }
}
