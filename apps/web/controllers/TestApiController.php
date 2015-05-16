<?php
/*
 * creator: maigohuang
 * */
require_once(WEB_ROOT . 'controllers/extra/ApiController.php');
require_once(WEB_ROOT . 'models/TestModel.php');
class TestApiController extends ApiController
{
  protected function GetResponse()
  {
    $model = new TestModel();
    return $model->GetResponse();
  }
}
