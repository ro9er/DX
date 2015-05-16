<?php
/*
 * creator: maigohuang
 * */
require_once(WEB_ROOT . 'controllers/extra/PageController.php');
require_once(WEB_ROOT . 'models/NoModel.php');
class IndexPageController extends PageController
{
  protected $js_module = 'web/pages/index.js';
  protected $title = 'maigoxin帅不帅';
  protected $tpl = 'pages/index.tpl';

  protected function GetResponse()
  {
    $model = new NoModel();
    return $model->GetResponse();
  }
}
