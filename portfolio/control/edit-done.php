<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>しつもん</title>
<meta name="description" content="しつもんするための便利なツール。しつもん上手になって安心して業務に取り組もう。">

<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
<link rel="stylesheet" href="../css/control.css">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
<div class="mi">
<?php

try
{
      require_once '../hensu.php';
      $post=sanitize($_POST);
      $code=$post['code'];
      $name=$post['name'];
      $mail=$post['mail'];
      $pass=$post['pass'];
      $year=$post['year'];

      require_once '../db.php';
      $db = new DB();
      $dbh = $db->dbConect();

      $sql='UPDATE member SET name=?,year=?,pass=?,mail=? WHERE code=?';
      $stmt=$dbh->prepare($sql);
      $data[]=$name;
      $data[]=$year;
      $data[]=$pass;
      $data[]=$mail;
      $data[]=$code;
      $stmt->execute($data);

      $dbh=null;

      }
      catch (Exception $e)
      {
        print $e;
        print 'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }

?>

修正しました。<br>
<br>
<a href="./control.php">戻る</a>
</div>
</body>
</html>
