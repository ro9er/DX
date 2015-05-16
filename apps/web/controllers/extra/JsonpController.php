<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'mvc/BaseController.php');
require_once(WEB_ROOT . 'views/JsonpView.php');
abstract class JsonpController extends BaseController
{
  protected function Run()
  {
    $response = $this->GetResponse();
    $this->view = $this->GetView();
    $this->view->SetData($response);
  }

  protected function BeforeRun()
  {
    return true;
  }

  protected function AfterRun()
  {
    return true;
  }

  protected function GetView()
  {
    return new JsonpView();
  }

  abstract protected function GetResponse();
}

