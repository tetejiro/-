<?php class Textarea
{
  function textform()
  {
    print '<form action="otameshi2.php" method="post">';
    print '<textarea name="otameshi"></textarea>';
    print "<br>";
    print '<input type="submit" value="OK">';
    print '</form>';
  }
}

//DB処理をオブジェクト指向で行う。
//1.DB接続
//2.取得
//3.切断

//1.DB接続
  class DB
  {
      function dbConect()
      {
          $dsn='mysql:host=localhost;dbname=portfolio;charset=utf8';
          $user='yuki';
          $password='hy1733505';

          try
          {
            $dbh = new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          }
          catch(\Exception $e)
          {
            print 'データベースに接続できませんでした。'.$e->getMessage();
            exit();
          }
          return $dbh;
      }

      //2.取得
      function dbSelect()
      {
          //DB接続
          $dbh = $this->dbConect();
          $sql = 'SELECT * FROM announce';
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          return $result;

          $dbh = null;
      }
  }

?>
