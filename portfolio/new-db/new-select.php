<?php
require_once 'new-const.php';

//ここには、セレクト文を全てまとめる。

class SelectDb
{
/*ここにnewした後に、
$dsn = ConstDb::dsn;
$user = ConstDb::user;
$password = ConstDb::password;
って書いたらエラーになるのはなぜ？？？？
*/

//１.registration/index.phpのセレクト文
function selectDb1()
{
    $ConstDb = new ConstDb();
    $dsn = ConstDb::dsn;
    $user = ConstDb::user;
    $password = ConstDb::password;
    try
    {
        $dbh = $ConstDb->ConnectDb($dsn, $user, $password);

        $sql = 'SELECT data,content FROM announce ORDER BY data DESC LIMIT 3';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
    }
    catch(Exception $e)
    {
        var_dump($e);
        exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
    }
    return $rec;
    }

    //2.login-check.phpのセレクト文
    function selectDb2($name, $pass)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);

            $sql='SELECT name,code FROM member WHERE name=:name AND pass=:pass';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':pass', $pass, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //3.reg-check.phpのセレクト文
    function selectDb3()
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT LAST_INSERT_ID()';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $sql = 'UNLOCK TABLES';
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //4.reg-check.phpのセレクト文(1)
    function selectDb4($honnin)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT * FROM now WHERE whose = :honnin';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':honnin', $honnin, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //5.reg-check.phpとmypage.phpのセレクト文(2)
    function selectDb5($code)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT * FROM now WHERE whose = :code';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':code', $code, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //5-2.reg-check.phpとmypage.phpのセレクト文(2)
    function selectDb52($code)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT name FROM member WHERE code = :code';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':code', $code, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //6.reg-check.phpのセレクト文(2)
    function selectDb6()
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT year, member. code, name FROM member';
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $rec = $stmt->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //7.reg-check.phpのセレクト文(2)
    function selectDb7($honnin)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT nitizi, whose, whom, situation, goal, what, why, try0
                    FROM question WHERE whose = :honnin';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':honnin', $honnin, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //8.reg-check.phpのセレクト文(2)
    function selectDb8 ($name)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql = 'SELECT name FROM member
                    WHERE code = :whom';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':whom', $name, PDO::PARAM_INT);
            $stmt->execute();
            $aite = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        if(!empty($aite)){
        return $aite['name'];
        }else{
            return $aite = '名無し';
        }
    }

    //9.select.phpのセレクト文(2)
    function selectDb9($code)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql='SELECT name FROM member WHERE code = :code';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':code', $code, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //10.select.phpとshitumon.phpとdelete.php
    function selectDb10($code)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql='SELECT name FROM member WHERE code = :code';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':code', $code, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }

    //11.done.phpと、edit.php
    function selectDb11($code)
    {
        $ConstDb = new ConstDb();
        $dsn = ConstDb::dsn;
        $user = ConstDb::user;
        $password = ConstDb::password;
        try
        {
            $dbh = $ConstDb->ConnectDb($dsn, $user, $password);
            $sql='SELECT name,mail FROM member WHERE code = :code';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':code', $code, PDO::PARAM_INT);
            $stmt->execute();
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
        }
        catch(Exception $e)
        {
            var_dump($e);
            exit ('セレクトできませんでした。<a href="../registration/index.php">もどる</a>');
        }
        return $rec;
    }
}