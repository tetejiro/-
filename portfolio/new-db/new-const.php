<?php
//ここには、定数とDB接続を書く。

//データベースの定数の定義
class ConstDb
{
    const dsn = 'mysql:dbname=portfolio;host=localhost;charset=utf8';
    const user = 'yuki';
    const password = 'hy1733505';

    const task = 'task';
    const bytime1 = 'bytime1';
    const bytime2 = 'bytime2';
    const emotion = 'emotion';
    const time1 = 'time1';
    const time2 = 'time2';
    const attention = 'attention';
    const strong1 = 'strong1';
    const strong2 = 'strong2';
    const strong3 = 'strong3';

/*ここに$dsn = self::dsn;
        $user = self::user;
        $password = self::password;って書いたらエラーになるのはなぜ？？？？
*/
    function ConnectDb($dsn, $user, $password)
    {
        $dsn = self::dsn;
        $user = self::user;
        $password = self::password;
        try
        {
            $dbh = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES, false]);
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('接続エラーです。<a href="../registration/index.php">もどる</a>');
        }
        return $dbh;
    }
}