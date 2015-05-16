<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'mvc/BaseView.php');
class ApiView extends BaseView
{
  public function Display()
  {
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($this->data);
  }

  public function SetData($data)
  {
    $this->data = $data;
  }
}

