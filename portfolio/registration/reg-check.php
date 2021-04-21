<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">

<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="../css/login.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
<main>
<?php
        require_once '../sanitize.php';
        $post=sanitize($_POST);
        $name=$post['name'];
        $year=$post['year'];
        $mail=$post['mail'];
        $pass=$post['pass'];
        $pass2=$post['pass2'];

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
          print 'パスワードを正しく入力してください。<br>';
          $okflg=false;
        }

        if($okflg==true)
        {
?>
<div class="hidari">
          <img class="img" src="../favicon/p-favicon2.png" alt="?">
</div>
<div class="migi">
<div class="naiyo">
          <p>入力内容確認</p><br><br>
          <ul>お名前<br>
          <li><?php print $name; ?></li></ul><br><br>
          <ul>mail<br>
          <li><?php print $mail; ?></li></ul><br><br>
          <ul>password<br>
          <li><?php print $pass; ?></li></ul><br><br>
          <form>
          <input type="button" onclick="history.back();" value="修正する"><br><br>
          </form>

<?php     $pass=md5($pass); ?>
          <form action="reg-done.php" method="post">
          <p><input type="hidden" name="name" value="<?php print $name; ?>"></p>
          <p><input type="hidden" name="year" value="<?php print $year; ?>"></p>
          <p><input type="hidden" name="pass" value="<?php print $pass; ?>"></p>
          <p><input type="hidden" name="mail" value="<?php print $mail; ?>"></p>
          <p><input type="submit" value="始める">
          </form>
<?php    }

        else
        {
?>        <form>
          <input type="button" onclick="history.back();" value="戻る">
          </form>
</div>
</div>
</main>
<?php        }
?>
</body>
</html>
