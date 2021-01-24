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
            $post=$_POST;
            $situation=$post['situation'];
            $goal=$post['goal'];
            $what=$post['what'];
            $why=$post['why'];
            $try=$post['try'];
            $code=$post['code'];

            $data[]=null;
            $sql='SELECT name,mail FROM member WHERE code=? ';
            $stmt=$dbh->prepare($sql);
            $data[]=$code;
            $stmt->execute($data);
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $dbh=null;
            $name=$rec['name'];
            $mail=$rec['mail']

            switch ($url)
            {
//              直近の $URL になんの値が入っているかで場合分け。
              case $_SESSION['horenso']:
              print '<a href="mylist.php">mylist</a>に保存されました。<br>';
              require_once('mail.php');
              print 'mailでほうれんそうをしました。';
              print '<a href="../registration/index.php">もどる</a>';
              break;

              case $_SESSION['shitumon']:
              print '保存しました。';
              require_once('mypage2.php');
              print 'mailで通知をしました。';
              print '<a href="../registration/index.php">もどる</a>';
              break;
            }
          }
?>
