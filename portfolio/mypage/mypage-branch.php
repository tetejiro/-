<?php
//require_once('libs/consts/AppConstants.php');
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
  exit('ログインしていません。');
  print '<a href="../registration/login.html">ログインへ</a>';
}
else
{
  require_once '../sanitize.php';
  $post=sanitize($_POST);
  $task=$post['task'];
  $bytime1=$post['bytime1'];
  $bytime2=$post['bytime2'];
  $emotion=$post['emotion'];
  $time1=$post['time1'];
  $time2=$post['time2'];
  $attention=$post['attention'];
  $strong1=$post['strong1'];
  $strong2=$post['strong2'];
  $strong3=$post['strong3'];

  if($task=='' || $bytime1=='' || $bytime2=='' || $emotion=='' || $time1==''
          || $time2=='' || $attention=='' || $strong1=='' || $strong2=='' || $strong3=='')
  {
    ?>
    <!DOCTYPE html>
    <html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta title="しつもん">

      <!-- css -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="../css/mannaka.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
    <link rel="icon" type="image/png" href="../favicon/p-favicon.png">
    </head>
    <body>
    <div class="zentai">
    <?php
    print '入力されていない箇所があります。全て入力してください。';
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
    print '</div>';
  }
  else
  {
    require_once '../new-db/new-const.php';
    $ConstDb = new ConstDb();
    $_SESSION[ConstDb::task]=$task;
    $_SESSION[ConstDb::bytime1]=$bytime1;
    $_SESSION[ConstDb::bytime2]=$bytime2;
    $_SESSION[ConstDb::emotion]=$emotion;
    $_SESSION[ConstDb::time1]=$time1;
    $_SESSION[ConstDb::time2]=$time2;
    $_SESSION[ConstDb::attention]=$attention;
    $_SESSION[ConstDb::strong1]=$strong1;
    $_SESSION[ConstDb::strong2]=$strong2;
    $_SESSION[ConstDb::strong3]=$strong3;
    header('Location:./mypage-update.php');
    exit();
  }
}
