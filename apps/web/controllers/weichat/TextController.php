<?php
/*
 * creator: maigohuang
 * */
require_once(WEB_ROOT . 'rpc/Tuling123.php');
class TextController
{
  public function Response($request, &$response)
  {
    if (preg_match("/help/i", $request->Content))
    {
      self::GoHelp($response);
    }
    elseif (preg_match("/maigo/i", $request->Content))
    {
      self::GoMaigoH5($response);
    }
    else
    {
      self::GoTuling($request, $response);
    }
  }

  public function GoTuling($request, &$response)
  {
    $data = \rpc\Tuling123::Talk($request->Content, $request->FromUserName);
    if ($data == false)
    {
      self::GoMaigoH5($response);
      return true;
    }

    if ($data['code'] == 100000)
    {
      if ($request->Content != $data['text'])
      {
        $response['MsgType'] = 'text';
        if (strlen($data['text']) > 128)
          $data['text'] = substr($data['text'], 0, 128)."...";
        $response['Content'] = '<![CDATA['.str_replace(PHP_EOL, '', $data['text']).']]>';
      }
      else
      {
        self::GoMaigoH5($response);
      }
    }
    else if ($data['code'] == 200000)
    {
      $response['MsgType'] = 'news';
      $articles = array(
        'item' => array(
           'Title' => $request->Content,
           'Description' => $data['text'],
           'PicUrl' => '',
           'Url' => $data['url'],
          )
        );
      $response['Articles'] = $articles;
      $response['ArticleCount'] = 1;
    }
    return true;
  }

  private function GoMaigoH5(&$response)
  {
    $response['MsgType'] = 'text';
    $response['Content'] = "来maigo之家看看吧";
  }

  private function GoHelp(&$response)
  {
    $response['MsgType'] = 'text';
    $response['Content'] = "你可以和我聊天，当然你也可以输入maigo去maigo家看看";
  }
}
