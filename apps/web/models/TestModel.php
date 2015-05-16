<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'mvc/BaseModel.php');
class TestModel extends BaseModel
{
  public function GetResponse()
  {
    $response = new Response();
    $data = array('hello world' => 'all');
    $response->data = $data;
    return $response;
  }
}
