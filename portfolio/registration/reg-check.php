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

<?php
        $name=$_POST['name'];
        $year=$_POST['year'];
        $mail=$_POST['mail'];
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];

        $okflg=true;
        if($name=='')
        {
          print '名前を入力してください。 <br>';
          $okflg=false;
        }
        if($mail=='' || preg_match('/\A([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\z/',$mail)==0)
        {
          print 'メールアドレスを正しく入力してください。 <br>';
          $okflg=false;
        }
        if($pass!==$pass2)
        {
          print 'パスワードを正しく入力してください。。<br>';
          $okflg=false;
        }

        if($okflg==true)
        {
          print 'これでよろしいでしょうか？<br>';
          print 'お名前(ID) <br>';
          print "$name".'<br>';
          print 'mail <br>';
          print "$mail".'<br>';
          print 'password<br>';
          print "$pass".'<br>';
          print '<form>';
          print '<input type="button" onclick="history.back();" value="修正する。">';
          print '</form>';

          $pass=md5($pass);
          print '<form action="reg-done.php" method="post">';
          print '<input type="hidden" name="name" value="'.$name.'">';
          print '<input type="hidden" name="year" value="'.$year.'">';
          print '<input type="hidden" name="email" value="'.$mail.'">';
          print '<input type="hidden" name="pass" value="'.$pass.'">';
          print '<input type="submit" value="始める">';
          print '</form>';
        }

        else
        {
          print '<form>';
          print '<input type="button" onclick="history.back();" value="戻る">';
          print '</form>';
        }
?>
</body>
</html>
