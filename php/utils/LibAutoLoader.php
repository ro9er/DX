<?php
spl_autoload_register(function($classname)
{
  if (file_exists(PHP_ROOT . 'utils/' . $classname . '.php'))
  {
    require_once(PHP_ROOT . 'utils/' . $classname . '.php');
    return true;
  }
  return false;
});
