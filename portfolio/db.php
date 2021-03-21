<?php
/*
$dsn='mysql:host=mysql148.phy.lolipop.lan;dbname=LAA1049460-portfolio;charset=utf8';
$user='LAA1049460';
$password='kuriharasan';
*/


Class DB
{
    function dbConect()
    {
        $dsn='mysql:host=localhost;dbname=portfolio;charset=utf8';
        $user='yuki';
        $password='hy1733505';
        try
        {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(\Exception $e)
        {
            print 'データベース接続失敗です。'.$e->getMessage();
            exit();
        }
        return $dbh;
    }

}

?>
