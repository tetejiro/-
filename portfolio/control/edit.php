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

  $code=$_GET['code'];

  require_once '../db.php';
  $db = new DB();
  $dbh = $db->dbConect();

  $sql='SELECT name,mail FROM member WHERE code=?';
  $stmt=$dbh->prepare($sql);
  $data[]=$code;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $name=$rec['name'];
  $mail=$rec['mail'];

  $dbh=null;

}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}


?>

スタッフ修正<br>
<br>
スタッフコード<br>
<?php print $code; ?>
<br>
<br>
<form method="post" action="edit-check.php">
<input type="hidden" name="code" value="<?php print $code; ?>">
スタッフ名<br>
<input type="text" name="name" class="waku" value="<?php print $name; ?>"><br><br>
第
<select name="year">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="シニア">シニア</option>
</select>
期 <br><br>
メールアドレス<br>
<input type="text" name="email" class="waku" value="<?php print $mail; ?>"><br><br>
パスワードを入力してください。<br>
<input type="password" name="pass" class="waku"><br><br>
パスワードをもう1度入力してください。<br>
<input type="password" name="pass2" class="waku"><br>
<br>
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</div>
</body>
</html>
