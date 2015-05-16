<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'thirdparty/log4php/Logger.php');

class Log
{
  static private $pid = null;
  public static function Configure($conf)
  {
    Logger::configure($conf);
  }

  private static function GetPid()
  {
    if (self::$pid === null)
    {
      self::$pid = @posix_getpid();
    }
    return self::$pid;
  }

  //trace debug info warn error fatal
  //Log::Debug('core', 'maigo is a good boy');
  public static function __callStatic($func, $arguments)
  {
    $bt = debug_backtrace();
    $file = $bt[0]['file'];
    $line = $bt[0]['line'];
    $func = strtolower($func);
    $pid = self::GetPid();
    if (sizeof($arguments) == 1)
    {
      Logger::getLogger('default')->$func("pid($pid)[$file][$line] ".$arguments[0]);
    }
    else
    {
      Logger::getLogger($arguments[0])->$func("pid($pid)[$file][$line] ".$arguments[1]);
    }
  }
}
