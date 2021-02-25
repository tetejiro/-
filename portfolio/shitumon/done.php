<?php
session_start();
session_regenerate_id(true);

          if(isset($_SESSION['login'])==false)
          {
            print 'ログインしてください。';
            print '<a href="../registration/login.html">ログインページへ</a>';
          }
          else
          {
            $whosename=$_SESSION['name'];
            $whose=$_SESSION['whose'];
            $code=$_SESSION['whom'];
            $situation=$_SESSION['situation'];
            $goal=$_SESSION['goal'];
            $what=$_SESSION['what'];
            $why=$_SESSION['why'];
            $try=$_SESSION['try'];

            $url=$_SESSION['url'];

            require_once '../db.php';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='SELECT name,mail FROM member WHERE code=?';
            $stmt=$dbh->prepare($sql);
            $data=array();
            $data[]=$code;
            $stmt->execute($data);
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $dbh=null;
            $name=$rec['name'];
            $mail=$rec['mail'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">

  <!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="../css/mannaka.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
<div class="zentai">
<?php

              switch($_SESSION['url'])
              {
//              直近の $URL になんの値が入っているかで場合分け。
                case $_SESSION['shitumon']:
                print '<a href="../mypage/mylist.php">質問リスト</a>に保存しました。<br>';
                require_once('mail2.php');
                print 'mailでしつもんの通知をしました。<br>';
                print '<a href="../registration/index.php">もどる</a>';
                break;

                case $_SESSION['horenso']:
                print '<a href="../mypage/mylist.php">質問リスト</a>に保存されました。<br>';
                require_once('mail.php');
                print 'mailでほうれんそうをしました。<br>';
                print '<a href="../registration/index.php">もどる</a>';
                break;

              }
?>
</div>
<?php
/*

              if ($url===$_SESSION['horenso'])
              {
                require_once('mail.php');
                print '<a href="../mypage/mylist.php">mylist</a>に保存されました。<br>';
                print 'mailでほうれんそうをしました。<br>';
                print '<a href="../registration/index.php">もどる</a>';
              }
              if($url===$_SESSION['shitumon'])
              {
                require_once('mail2.php');
                print '<a href="../mypage/mylist.php">mylist</a>に保存されました。<br>';
                print 'mailで通知をしました。<br>';
                print '<a href="../registration/index.php">もどる</a>';
              }
*/
          }
?>
