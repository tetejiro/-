<?php
        try
        {
            require_once '../hensu.php';
            $post=sanitize($_POST);
            $name=$post['name'];
            $year=$post['year'];
            $pass=$post['pass'];
            $mail=$post['mail'];

            require_once '../db.php';
            $db = new DB();
            $dbh = $db->dbConect();

            $sql='LOCK TABLES member READ';
            $sql='INSERT INTO member(name,year,pass,mail) VALUES (?,?,?,?)';
            $stmt=$dbh->prepare($sql);
            $data=array();
            $data[]=$name;
            $data[]=$year;
            $data[]=$pass;
            $data[]=$mail;
            $stmt->execute($data);

            $sql='SELECT LAST_INSERT_ID()';
          	$stmt=$dbh->prepare($sql);
          	$stmt->execute();
          	$rec=$stmt->fetch(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['login']=1;
            $_SESSION['name']=$name;
            $_SESSION['code']=$rec['LAST_INSERT_ID()'];
            $sql='UNLOCK TABLES';
            header('Location:../mypage/mypage.php');
            exit();
      }
      catch (\Exception $e)
      {
            var_dump($e);
            print 'ただいま障害によりご迷惑をおかけしております。';
            print '<form action="registration.html" method="post">';
            print '<input type="submit" value="戻る">';
            print '</form>';
            exit();
      }

?>
