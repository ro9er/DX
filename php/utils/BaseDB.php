<?php
/*
 * creator: maigohuang
 * */


class BaseDB
{
  public static function Gets($db, $table, array $conditions)
  {
    $c = '';
    if (count($conditions) != 0)
      $c = 'where '.implode(' and ', $conditions);
    $sql = <<<SQL
select * from $table $c
SQL;

    return \MysqlClient::ExecuteQuery($db, $sql);
  }

  public static function Update($db, $table, array $behavior, array $conditions)
  {
    $c = '';
    if (count($conditions) != 0)
    {
      $t = array();
      foreach ($conditions as $key => $value)
      {
        if (is_string($key))
        {
          $t[] = "$key = '$value'";
        }
        else
        {
          $t[] = $value;
        }
      }
      $c = 'where '.implode(' and ', $t);
    }
    $b = '';
    if (count($behavior) != 0)
    {
      $t = array();
      foreach ($behavior  as $key => $value)
      {
        $t[] = "$key = '$value'";
      }
      $b = 'set '.implode(', ', $t);
    }
    $sql = <<<SQL
update $table $b $c
SQL;
    if (\MysqlClient::ExecuteUpdate($db, $sql) == false)
    {
      return false;
    }
    if (\MysqlClient::UpdateAffectedRows($db) == 0)
    {
      return false;
    }
    return true;
  }

  public static function Sets($db, $table, array $keys, array $values)
  {
    $keys = implode(',', $keys);
    foreach ($values as $key => $value)
    {
      foreach ($value as &$v)
      {
        $v = "'$v'";
      }
      $values[$key] = '('.implode(',', $value).')';
    }
    $values = implode(',', $values);
    $sql = <<<SQL
replace into $table($keys) values $values
SQL;
    return \MysqlClient::ExecuteUpdate($db, $sql);
  }

  public static function Insert($db, $table, array $keys, array $values)
  {
    $keys = implode(',', $keys);
    foreach ($values as $key => $value)
    {
      foreach ($value as &$v)
      {
        $v = "'$v'";
      }
      $values[$key] = '('.implode(',', $value).')';
    }
    $values = implode(',', $values);
    $sql = <<<SQL
insert into $table($keys) values $values
SQL;
    return \MysqlClient::ExecuteUpdate($db, $sql);
  }

}
