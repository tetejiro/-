<?php
session_start();
session_regenerate_id(true);
          if(isset($_SESSION['login'])==false)
          {
            print 'ログインしてください。';
            print '<a href="../registration/login.html">ログインページへ</a>';
          }
          else
          {
            $_SESSION['shitumon']=1;
            $url=$_SESSION['shitumon'];
            //質問相手のコード
            $code=$_GET['code'];
            print '<form action="hozon.php" method="post">';
            print '状況を整理しましょう。<br>';
            print '<textarea name="situation" rows="4" cols="50"></textarea><br>';
            print 'どういう状態がゴールですか？<br>';
            print '<textarea name="goal" rows="4" cols="50"></textarea><br>';
            print '何ができませんか？<br>';
            print '<textarea name="what" rows="4" cols="50"></textarea><br>';
            print '自分ではなんでだと思いますか？<br>';
            print '<textarea name="why" rows="4" cols="50"></textarea><br>';
            print '試してみたこと・その他。<br>';
            print '<textarea name="try" rows="4" cols="50"></textarea>';
            print '<input type="hidden" name="code" value="'.$code.'">';
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
            <h2>check</h2>
            <p>答えが知りたい？それとも考え方が知りたい？</p>
            <p>聞くべき人はその人ですか？</p>
            <p>質問が抽象的すぎませんか？</p>
            <p>分からないことは自分で調べましたか？</p>
            <p>相手はお手すきですか？</p>
            <p>相手のお話を素直に受け入れる準備はできていますか？</p>
            <br><br>
            <h1>いって</h1><br>
            <h1>らっ</h1><br>
            <h1>しゃい</h1><br><br>

<?php
            print '<input type="submit" value="これでよし。">';
            print '</form>';
            print '</body>';
}
?>
