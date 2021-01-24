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
              $data[]=$name;
              $data[]=$pass;
              $stmt->execute($data);
              $rec=$stmt->fetchAll(PDO::FETCH_ASSOC);
              $dbh=null;

                session_start();
                $_SESSION['login']=1;
                $_SESSION['name']=$name;
                $_SESSION['code']=$code;
                header('Location:../mypage/mypage.php');

              if(isset($rec)==false)
              {
                print '<form action="login.html" method="post">';
                print '登録されていないものです。';
                print '<input type="submit" value="もどる">';
              }

            }
            catch (\Exception $e)
            {
              print '障害発生中';
            }
?>
