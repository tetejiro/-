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
  print '<a href="../shitumon/horenso.php?code='.$code.'">報・連・相する</a><br>';
  print '<br>';
  print '<a href="../shitumon/shitumon.php?code='.$code.'">質問を予約する</a><br>';
  print '<br>';
  print '<a href="../mypage/mylist.php">過去のほうれんそう・質問を見る。</a>';
  print '<br>';
}
?>
