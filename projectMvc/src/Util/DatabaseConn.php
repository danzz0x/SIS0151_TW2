<?php

namespace App\Util;

use Nette\Database\Connection;
use Nette\Caching\Storages\FileStorage;
use Nette\Database\Structure;
use Nette\Database\Conventions\DiscoveredConventions;
use Nette\Database\Explorer;

class DatabaseConn
{
  public static function getConn()
  {
    $dsn = "mysql:host=127.0.0.1;dbname=db_13263249";
    $user = "danzo";
    $password = "root";
    $database = new Connection($dsn, $user, $password);
    $storage = new FileStorage(sys_get_temp_dir());
    $structure = new Structure($database, $storage);
    $conventions = new DiscoveredConventions($structure);
    $explorer = new Explorer($database, $structure, $conventions);
    return $explorer;
  }
}
