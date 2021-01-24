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
//              $post=$array();
              $post=$_POST;
//              $post=(string)$post;
//              エスケープ処理配列だからできない？
//              $post=htmlspecialchars($post,ENT_QUOTES,'UTF-8');
              $code=$_SESSION['code'];
              if(isset($post['task'])==true)
              {
                $task=$post['task'];
              }
              if(isset($post['bytime'])==true)
              {
                $bytime1=$post['bytime1'];
              }
              if(isset($post['bytime2'])==true)
              {
                $bytime2=$post['bytime2'];
              }
              if(isset($post['emotion'])==true)
              {
                $emotion=$post['emotion'];
              }
              if (isset($post['time1'])==true)
              {
                $time1=$post['time1'];
              }
              if (isset($post['time2'])==true)
              {
                $time2=$post['time2'];
              }
              if (isset($post['attention'])==true)
              {
                $attention=$post['attention'];
              }
              if (isset($post['strong1'])==true)
              {
                $strong1=$post['strong1'];
              }
              if (isset($post['strong2'])==true)
              {
                $strong2=$post['strong2'];
              }
              if (isset($post['strong3'])==true)
              {
                $strong3=$post['strong3'];
              }

        try
        {
              require_once '../db.php';
              $dbh=new PDO($dsn,$user,$password);
              $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

              $sql='INSERT INTO now(code,task,bytime1,bytime2,emotion,time1,time2,attention,strong1,strong2,strong3)
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
              $stmt=$dbh->prepare($sql);
              $data[]=$code;
              if(isset($task)==true)
              {
                $data[]=$task;
              }
              if(isset($bytime1)==true)
              {
                $data[]=$bytime1;
              }
              if(isset($bytime2)==true)
              {
                $data[]=$bytime2;
              }
              if(isset($emotion)==true)
              {
                $data[]=$emotion;
              }
              if (isset($time1)==true)
              {
                $data[]=$time1;
              }
              if (isset($time2)==true)
              {
                $data[]=$time2;
              }
              if (isset($attention)==true)
              {
                $data[]=$attention;
              }
              if (isset($strong1)==true)
              {
                $data[]=$strong1;
              }
              if (isset($strong2)==true)
              {
                $data[]=$strong2;
              }
              if (isset($strong3)==true)
              {
                $data[]=$strong3;
              }
/*              $data[]=$code;
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
*/

              header('Location:mypage.php');
        }
        catch (\Exception $e)
        {
              print '現在障害発生中です。';
              print '<a href="../registration/login.html">もどる</a>';
        }

}

?>
