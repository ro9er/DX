<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'mvc/UrlRouter.php');
class WebRouter extends UrlRouter
{
  protected function GetNotFoundController()
  {
    return 'NotFoundController';
  }

  public function Route()
  {
    new RunTimeUtil($_SERVER['REQUEST_URI'] .'('.$_SERVER['REMOTE_ADDR'].')');
    parent::Route();
  }
}

$mapping = array(
  '/weichat' => 'WeichatController',
  //interfaces
  '/interfaecs/home_pick' => 'Interfaces/HomePickController',
  //pages
  );

$router = new WebRouter();
$router->SetMapping($mapping);
$router->SetControllerPath('controllers');
$router->Route();

