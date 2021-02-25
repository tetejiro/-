<?php
require_once('../hensu.php');

          $post=sanitize($_POST);
          $name=$post['name'];
          $pass=$post['pass'];
          $pass=md5($pass);

          try
          {
              require_once '../db.php';
              $dbh=new PDO($dsn,$user,$password);
              $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

              $sql='SELECT name,code FROM member WHERE name=? AND pass=?';
              $stmt=$dbh->prepare($sql);
              $data=array();
              $data[]=$name;
              $data[]=$pass;
              $stmt->execute($data);
              $rec=$stmt->fetch(PDO::FETCH_ASSOC);
              $dbh=null;

              if($rec==true)
              {
                session_start();
                $_SESSION['login']=1;
                $_SESSION['name']=$rec['name'];
                $_SESSION['code']=$rec['code'];
                header('Location:../mypage/mypage.php');
                exit();
              }
              else
              {
?>
                <!DOCTYPE html>
                <html lang="ja">
                <head>
                <meta charset="utf-8">
                <meta title="しつもん">

                <!-- css -->
                <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
                <link rel="stylesheet" href="../css/mylist.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
                <link rel="icon" type="image/png" href="../p-favicon.png">
                </head>
                <body>
<?php
                print '<div class="mi">';
                print '<form action="login.html" method="post">';
                print '<p>登録されていないものです。</p><br>';
                print '<input type="submit" value="もどる">';
                print '</form>';
                print '</div>';
              }
            }
            catch (\Exception $e)
            {
              print '障害発生中';
            }
?>
</body>
</html>
