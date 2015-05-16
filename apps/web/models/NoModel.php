<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'mvc/BaseModel.php');
class NoModel extends BaseModel
{
  public function GetResponse()
  {
    $response = new Response();
    return $response;
  }
}
