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

<?php

try
{

$code=$_POST['code'];

require_once '../db.php';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM member WHERE code=?';
$stmt=$dbh->prepare($sql);
$data[]=$code;
$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
  print 'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}

?>

<div class="mi">
削除しました。<br>
<br>
<a href="./control.php">戻る</a>
</div>
</body>
</html>
