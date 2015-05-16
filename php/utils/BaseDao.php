<?php
/*
 * creator: maigohuang
 * */
abstract class BaseDao extends Singleton
{
  protected $DB_NAME = '';
  protected $TABLE_NAME = '';
  protected $CACHE_TABLE = '';
  protected $KEY = '';

  //单条插入
  public function Insert($data)
  {
    if (\BaseDB::Insert($this->DB_NAME, $this->TABLE_NAME, array_keys($data), array(array_values($data))) == true)
    {
      $id = \MysqlClient::GetInsertID($this->DB_NAME);
      \BaseCache::Dels($this->CACHE_TABLE, array($id));
      return true;
    }
    return false;
  }

  //更新
  public function Update($behavior, $conditions)
  {
    if (empty($conditions[$this->KEY]))
    {
      return false;
    }

    if (\BaseDB::Update($this->DB_NAME, $this->TABLE_NAME, $behavior, $conditions) == true)
    {
      \BaseCache::Dels($this->CACHE_TABLE, array($conditions[$this->KEY]));
      return true;
    }
    return false;
  }

  //批量获取
  public function Gets($ids)
  {
    $data = \BaseCache::Gets($this->CACHE_TABLE, $ids);
    
    $db_ids = array_diff($ids, array_keys($data));
    if (!empty($db_ids))
    {
      $db_ids_string = implode(' , ', $db_ids);
      $db_data = \BaseDB::Gets($this->DB_NAME, $this->TABLE_NAME, array($this->KEY . " in ($db_ids_string)"));

      foreach ($db_data as $value)
      {
        $data[$value[$this->KEY]] = $value;
      }
    }

    foreach (array_diff($ids, array_keys($data)) as $id)
    {
      $data[$id] = false;
    }

    \BaseCache::Sets($this->CACHE_TABLE, $data);
    return $data;
  }
}
