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
        //自分のコード
        $whose=$_SESSION['code'];
        $task=$_SESSION['task'];
        $bytime1=$_SESSION['bytime1'];
        $bytime2=$_SESSION['bytime2'];
        $emotion=$_SESSION['emotion'];
        $time1=$_SESSION['time1'];
        $time2=$_SESSION['time2'];
        $attention=$_SESSION['attention'];
        $strong1=$_SESSION['strong1'];
        $strong2=$_SESSION['strong2'];
        $strong3=$_SESSION['strong3'];

          try
          {
              require_once '../db.php';
              $db = new DB();
              $dbh = $db->dbConect();

              $sql='INSERT INTO now (whose,task,bytime1,bytime2,emotion,time1,time2,attention,strong1,strong2,strong3)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?)';
              $stmt=$dbh->prepare($sql);
              $data[]=$whose;
              $data[]=$task;
              $data[]=$bytime1;
              $data[]=$bytime2;
              $data[]=$emotion;
              $data[]=$time1;
              $data[]=$time2;
              $data[]=$attention;
              $data[]=$strong1;
              $data[]=$strong2;
              $data[]=$strong3;
              $stmt->execute($data);
              $dbh=null;

              header('Location:mypage.php');
              exit();
            }
            catch (\Exception $e)
            {
              var_dump($e);
              print '現在障害発生中です。<br>';
              print '<a href="../registration/login.html">もどる</a>';
            }
}
?>
