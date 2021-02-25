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
              $_SESSION['url']=array();
              $_SESSION['horenso']=0;
              $_SESSION['shitumon']=1;
              $_SESSION['url']=$_SESSION['shitumon'];
              //質問相手のコード
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
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
<div class="ue">
<div class="ue1">
              <img src="../favicon/p-favicon.png">
              <h2>check</h2>
              <p><?php print $name.'さんへ' ?></p>
</div>
<div class="ue2">
              <p>答えが知りたい？それとも考え方が知りたい？</p>
              <p>聞くべき人はその人ですか？</p>
              <p>質問が抽象的すぎませんか？</p>
              <p>分からないことは自分で調べましたか？</p>
              <p>相手はお手すきですか？</p>
              <p>相手のお話を素直に受け入れる準備はできていますか？</p>
</div>
</div>
            <form action="hozon.php" method="post">
<div class="shitumon">
<div class="goal">
              状況を整理しましょう。<br>
              <textarea name="situation" rows="10" cols="35"></textarea>
</div>
<div class="situation">
              どういう状態がゴールですか？<br>
              <textarea name="goal" rows="10" cols="35"></textarea>
</div>
<div class="what">
              何ができませんか？<br>
              <textarea name="what" rows="10" cols="35"></textarea>
</div>
<div class="why">
              自分ではなんでだと思いますか？<br>
              <textarea name="why" rows="10" cols="35"></textarea>
</div>
<div class="sonota">
              試してみたこと・その他。<br>
              <textarea name="try" rows="10" cols="35"></textarea>
</div>
</div>
            <input type="hidden" name="code" value="<?php print $code ?>">
<div class="menu">
            <input type="submit" value="これでよし">
            </form>
            <a href="../mypage/mypage.php">もどる</a>
</div>
</body>
<?php }
?>
