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
require_once '../hensu.php';
$post=sanitize($_POST);
$code=$post['code'];
$name=$post['name'];
$mail=$post['email'];
$pass=$post['pass'];
$pass2=$post['pass2'];
$year=$post['year'];

if($name=='')
{
  print 'スタッフ名が入力されていません<br>';
}
else
{
  print 'スタッフ名:<br>';
  print $name;
  print '<br>';
}

if($pass=='')
{
  print 'パスワードが入力されていません<br>';
}

if($pass!=$pass2)
{
  print 'パスワードが一致しません。<br>';
}
if($mail=='')
{
  print 'メールアドレスが入力されていません。';
}

if($name=='' || $pass=='' || $pass!=$pass2)
{
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '</form>';
}
else
{
  $pass=md5($pass);
  print '<form method="post" action="edit-done.php">';
  print '<input type="hidden" name="code" value="'.$code.'">';
  print '<input type="hidden" name="name" value="'.$name.'">';
  print '<input type="hidden" name="pass" value="'.$pass.'">';
  print '<input type="hidden" name="mail" value="'.$mail.'">';
  print '<input type="hidden" name="year" value="'.$year.'">';
  print '<br>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}

?>
</div>
</body>
</html>
