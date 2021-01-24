<?php
        try
        {
          require_once('../hensu.php');
          $post=$_POST;
          $post=sanitize($post);
          $name=$post['name'];
          $year=$post['year'];
          $pass=$post['pass'];
          $mail=$post['email'];
          var_dump($post);
          print_r("$name");
          print_r("$year");
          print_r("$pass");
          print_r("$mail");
          
          require_once '../db.php';
          $dbh=new PDO($dsn,$user,$password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          $sql='LOCK TABLEES member READ';
          $sql='INSERT INTO member(name,year,pass,mail) VALUES (?,?,?,?)';
          $stmt=$dbh->prepare($sql);
//print '28';
          $data[]=array($name,$year,$pass,$mail);
/*          $data[]=$year;
          $data[]=$pass;
          $data[]=$mail;
*/
print '30';
          $stmt->execute($data);
print '33';
          $sql='SELECT LAST_INSERT_ID()';
        	$stmt=$dbh->prepare($sql);
        	$stmt->execute();
        	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
        	$code=$rec['LAST_INSERT_ID()'];
          $dbh=null;
          $sql='UNLOCK TABLES';
print '41';
          session_start();
          $_SESSION['code']=$code;
          $_SESSION['name']=$name;
          $_SESSION['login']=1;
print '46';
          header('Location:../mypage/mypage.php');

        }
        catch (\Exception $e)
        {
          print 'ただいま障害によりご迷惑をおかけしております。';
          print '<form action="registration.html" method="post">';
          print '<input type="submit" value="戻る">';
          exit();
        }
?>
