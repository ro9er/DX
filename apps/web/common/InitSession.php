<?php
/*
 * creator: maigohuang
 * */
require_once(PHP_ROOT . 'utils/Utility.php');
require_once(PHP_ROOT . 'utils/Cookie.php');
require_once(PHP_ROOT . 'utils/Session.php');
$session_id = Cookie::Get(SESSIONID);
if (empty($session_id))
{
  $session_id = Utility::GetSessionID();
  session_id($session_id);
  Cookie::Set(SESSIONID, $session_id);
}
Session::Init();
