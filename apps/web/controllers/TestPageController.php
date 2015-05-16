<?php
/*
 * creator: maigohuang
 * */
require_once(WEB_ROOT . 'controllers/extra/PageController.php');
require_once(WEB_ROOT . 'models/TestModel.php');
class TestPageController extends PageController
{
  protected $js_module = 'web/pages/test_page.js';
  protected $title = 'maigoxin.you';
  protected $tpl = 'pages/test_page.tpl';

  protected function GetResponse()
  {
    $model = new TestModel();
    return $model->GetResponse();
  }
}
