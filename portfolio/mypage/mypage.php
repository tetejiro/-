<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
  print 'ログインしていません。';
  print '<a href="../registration/login.html">ログインへ</a>';
  exit();
}
else
{
  print $_SESSION['name'];
  print 'さん。今日も頑張ろう。';

                require_once '../db.php';
                $dbh=new PDO($dsn,$user,$password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sql='SELECT task,bytime1,bytime2,emotion,time1,time2,attention,strong1,strong2,strong3
                      FROM now where nitizi=(select max(nitizi) from now)';
                $stmt=$dbh->prepare($sql);
                $stmt->execute();
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                $dbh=null;

                // SELECT * FROM テーブル名 where カラム名=(select max(カラム名) from テーブル名)
                // SELECT * FROM テーブル名 ORDER BY 列名 DESC LIMIT 1
                // 1SELECT max(列名） FROM テーブル名　GROUP BY 列名

/*
                member-list.phpからパラメータでcodeを送っているから、
                他の人のマイページを参照している場合に、codeを変数に代入。
*/
                if(isset($_GET['code'])==true)
                {
                  $code=$_GET['code'];
                }
//              前回記録している内容があれば、その内容を表示するため、値を変数に代入。
                if(isset($rec['task'])==true)
                {
                  $task=$rec['task'];
                }
                if(isset($rec['bytime'])==true)
                {
                  $bytime1=$rec['bytime1'];
                }
                if(isset($rec['bytime2'])==true)
                {
                  $bytime2=$rec['bytime2'];
                }
                if(isset($rec['emotion'])==true)
                {
                  $emotion=$rec['emotion'];
                }
                if (isset($rec['time1'])==true)
                {
                  $time1=$rec['time1'];
                }
                if (isset($rec['time2'])==true)
                {
                  $time2=$rec['time2'];
                }
                if (isset($rec['attention'])==true)
                {
                  $attention=$rec['attention'];
                }
                if (isset($rec['strong1'])==true)
                {
                  $strong1=$rec['strong1'];
                }
                if (isset($rec['strong2'])==true)
                {
                  $strong2=$rec['strong2'];
                }
                if (isset($rec['strong3'])==true)
                {
                  $strong3=$rec['strong3'];
                }

  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">

<!-- css -->
<link rel="stylesheet" href="https:unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="registration.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../p-favicon.png">
</head>
<body>
              <h1>しつもん</h1>

              更新 <br>
              他の人 <br>
              しつもんする <br><br>

              <form action="mypage-update.php" method="post">
                今は何をしていますか？ <br>
                <textarea name="now" value="<?php $now ?>"></textarea><br>
                どれくらいかかりそうですか？ <br>
                <input type="time" name="bytime1" value="<?php $bytime1 ?>">
                ～
                <input type="time" name="bytime2" value="<?php $bytime2 ?>"><br>
                <fieldset>
                  <legend>今日の気分は？</legend><br>
                  <label><input type="radio" name="emotion" value="<?php $emotion ?>">余裕</label>
                  <label><input type="radio" name="emotion" value="<?php $emotion ?>">普通</label>
                  <label><input type="radio" name="emotion" value="<?php $emotion ?>">余裕ない</label>
                  <label><input type="radio" name="emotion" value="<?php $emotion ?>">忙しい</label>
                  <label><input type="radio" name="emotion" value="<?php $emotion ?>">手伝ってほしい</label>
                </fieldset>
                サマータイム <br>
                <input type="time" name="time1" value="<?php $time1 ?>">
                ～
                <input type="time" name="time2" value="<?php $time2 ?>"><br>
                質問時の注意事項 <br>
                <textarea name="attention" rows="4" cols="50" value="<?php $attention ?>"
                  placeholder="※質問する前に見ておいてほしいことを書いてください。"></textarea><br>
                ここは私に任せて！ <br>
                <label>1<input type="text" name="strong1" value="<?php $strong1 ?>"></label>
                <label>2<input type="text" name="strong2" value="<?php $strong2 ?>"></label>
                <label>3<input type="text" name="strong3" value="<?php $strong3 ?>"></label><br><br>
                <input type="hidden" name="code" value="<?php $code ?>">
            <?php
                $session_code=$_SESSION['code'];

                if ($session_code==$_SESSION['code'])
                {
                  print '<input type="submit" value="更新する">';
                }
            ?>
                <a href="member-list.php">他の人</a>

            <?php
                if ($code!==$session_code)
                {
                    print '<a href="select.php?code='.$code.'">しつもんする</a><br>';
                }
            ?>
              </form>
</body>
</html>
