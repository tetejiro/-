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
            $_SESSION['horenso']=1;
            $url=$_SESSION['horenso'];
            print '<form action="hozon.php" method="post">';
            print '今回のほうれんそうの目的はなんですか？<br>';
            print '<textarea name="goal" rows="4" cols="50"></textarea><br>';
            print '前提状況を伝えましょう。<br>';
            print '<textarea name="situation" rows="4" cols="50"></textarea><br>';
            print '到達点とのギャップ・問題・報告事項・相談内容など<br>';
            print '<textarea name="what" rows="4" cols="50"></textarea><br>';
            print '自分ではどう考えましたか？<br>';
            print '<textarea name="why" rows="4" cols="50"></textarea><br>';
            print 'その他<br>';
            print '<textarea name="try" rows="4" cols="50"></textarea>';
            $code=$_GET['code'];
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
            print '<input type="submit" value="保存してメールを送る。">';
            print '</form>';
            print '</body>';
      }
?>
