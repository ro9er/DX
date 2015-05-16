<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'mvc/BaseModel.php');
class NotFoundModel extends BaseModel
{
  public function GetResponse()
  {
    $response = new Response();
    $data = array('hello all' => 'This is maigohuang. Your url not be found. If you are a single, pls contact with me~');
    $response->data = $data;
    return $response;
  }
}
