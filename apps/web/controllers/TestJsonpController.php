<?php
/*
 * creator: maigohuang
 * */
require_once(WEB_ROOT . 'controllers/extra/JsonpController.php');
require_once(WEB_ROOT . 'models/TestModel.php');
class TestJsonpController extends JsonpController
{
  protected function GetResponse()
  {
    $model = new TestModel();
    return $model->GetResponse();
  }
}
