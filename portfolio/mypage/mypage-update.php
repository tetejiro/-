<?php
session_start();
session_regenerate_id();
if(isset($_SESSION['login'])==false)
{
  print 'ログインしていません。';
  print '<a href="../registration/login.php">ログインへ</a>';
}
else
{
        require_once '../new-db/new-const.php';
        $ConstDb = new ConstDb();
        //自分のコード
        $whose=$_SESSION['code'];
        $task=$_SESSION[ConstDb::task];
        $bytime1=$_SESSION[ConstDb::bytime1];
        $bytime2=$_SESSION[ConstDb::bytime2];
        $emotion=$_SESSION[ConstDb::emotion];
        $time1=$_SESSION[ConstDb::time1];
        $time2=$_SESSION[ConstDb::time2];
        $attention=$_SESSION[ConstDb::attention];
        $strong1=$_SESSION[ConstDb::strong1];
        $strong2=$_SESSION[ConstDb::strong2];
        $strong3=$_SESSION[ConstDb::strong3];

          try
          {
              require_once '../new-db/new-insert.php';
              $InsertDb = new InsertDb();
              $InsertDb->insertDb3($whose,$task,$bytime1,$bytime2,$emotion,$time1,$time2,$attention,$strong1,$strong2,$strong3);

              header('Location:mypage.php');
              exit();
            }
            catch (Exception $e)
            {
              var_dump($e);
              print '現在障害発生中です。<br>';
              print '<a href="../registration/login.html">もどる</a>';
            }
}
?>
