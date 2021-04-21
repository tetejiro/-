<?php
require_once 'const.php';
$ConstDb = new ConstDb();

//接続
class HandleDb
{
    function ConectDb($dsn, $user, $password)
    {
        //$ConstDbをここに書いたら、$ConstDbは無効みたいな表示がでる。
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;

        try
        {
            $dbh = new PDO($dsn, $user, $password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES, false]);
        }
        catch(\Exception $e)
        {
            print '接続エラーです。';
            var_dump($e);
        }
        return $dbh;
    }

    function InsertDb($messages, $names, $mails)
    {
        //extendで継承したものの扱い方がわからない。
        //この$dsnとかは、最初に1行目に書いてたけどここのクラスの$dsnとかに波線がでた。
        //親クラスから継承するときも、メソッドを呼び出さないと使えない？
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;

        try
        {
            $dbh = $this->ConectDb($dsn, $user, $password);
            $sql = 'INSERT INTO contact(messages, names, mails)
                    VALUES(:messages, :names, :mails)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindvalue(':messages', $messages, PDO::PARAM_STR);
            $stmt->bindvalue(':names', $names, PDO::PARAM_STR);
            $stmt->bindvalue(':mails', $mails, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(\Exception $e)
        {
            var_dump($e);
            print 'インサートエラーです。';
        }
        $dbh = null;
    }
}
