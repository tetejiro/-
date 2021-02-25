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
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  $sql='SELECT name FROM member WHERE code=?';
  $stmt=$dbh->prepare($sql);
  $data[]=$code;
  $stmt->execute($data);

  $rec=$stmt->fetch(PDO::FETCH_ASSOC);
  $name=$rec['name'];

  $dbh=null;

}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}


?>
<p>このスタッフを削除してよろしいですか？</p>
<br>
スタッフコード<br>
<?php print $code; ?>
<br>
スタッフ名<br>
<?php print $name; ?>
<br><br>

<form method="post" action="delete-done.php">
<input type="hidden" name="code" value="<?php print $code; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</div>
</body>
</html>
