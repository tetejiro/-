<?php
session_start();
session_regenerate_id(true);
if($_SESSION['login']==false)
{
  print 'ログインしてください。';
  print '<a href="../login.php">ログインページへ</a>';
}
else
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
  $stmt=null;
  $name=$rec['name'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">

<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="../css/select.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
<main>
<div class="bun">
  <p><?php print $name.'さんに'; ?></p><br>
  <a href="../shitumon/horenso.php?code=<?php print $code ?>">報・連・相する</a><br>
  <a href="../shitumon/shitumon.php?code=<?php print $code ?>">質問を予約する</a><br>
  <a href="../mypage/mypage.php">マイページへもどる</a>
</div>
</main>
</body>
</html>
<?php
}
?>
