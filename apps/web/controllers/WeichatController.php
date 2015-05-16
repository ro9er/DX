<?php
/*
 * creator: maigohuang
 * */
require_once(WEB_ROOT . 'controllers/extra/ApiController.php');
require_once(WEB_ROOT . 'models/NoModel.php');
class WeichatController extends ApiController
{
  private $map = array(
    'text' => 'TextController',
    'image' => 'ImageController',
    );
  protected function GetResponse()
  {
    if (!$this->Route())
      $this->Check();
    exit();
  }

  protected function Route()
  {

    if (isset($GLOBALS['HTTP_RAW_POST_DATA']))
    {
      $post_str = $GLOBALS["HTTP_RAW_POST_DATA"];
      libxml_disable_entity_loader(true);
      $post_obj = simplexml_load_string($post_str, 'SimpleXMLElement', LIBXML_NOCDATA);
      Log::info($post_obj->FromUserName . ' send ' . $post_obj->MsgType . ' message!');
      if (isset($this->map[trim($post_obj->MsgType)]))
      {
        $chat_controller_name = $this->map[trim($post_obj->MsgType)];
      }
      else
      {
        $chat_controller_name = 'RandController';
      }

      require_once(WEB_ROOT . "controllers/weichat/$chat_controller_name.php");
      $chat_controller = new $chat_controller_name();
      $response = array(
        'ToUserName' => $post_obj->FromUserName,
        'FromUserName' => $post_obj->ToUserName,
        'CreateTime' => time(),
      );
      $chat_controller->Response($post_obj, $response);

      Log::info(Utility::ArrayToXMLString('xml', $response));
      echo Utility::ArrayToXMLString('xml', $response);
      return true;
    }
    else
    {
      return false;
    }
  }

  private function Check()
  {
    $token = 'maigohuang';
    $echo_str = HttpRequestHelper::GetParam('echostr');
    $sign = HttpRequestHelper::GetParam('signature');
    $timestamp = HttpRequestHelper::GetParam('timestamp');
    $nonce = HttpRequestHelper::GetParam('nonce');

    $tmpArray = array($token, $timestamp, $nonce);
    sort($tmpArray, SORT_STRING);
    $tmpStr = implode($tmpArray);
    $tmpStr = sha1($tmpStr);
    if ($tmpStr == $sign)
      echo $echo_str;
  }
}
