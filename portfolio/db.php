<?php
/*
$dsn='mysql:host=mysql148.phy.lolipop.lan;dbname=LAA1049460-portfolio;charset=utf8';
$user='LAA1049460';
$password='kuriharasan';
*/
require_once('libs/bases/BaseDB.php');
final class DB extends BaseDB
{
    protected function getConnectionString(): string
    {
        return 'mysql:host=localhost;dbname=portfolio;charset=utf8';
    }
    protected function getId(): string
    {
        return 'yuki';
    }
    protected function getPassword(): string
    {
        return 'hy1733505';
    }

}

?>
