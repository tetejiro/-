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
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">

<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="../css/member-list.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
<main>
<div class="header">
                  <img src="../favicon/p-favicon4.png" alt="?">
<div class="kotoba">
<div class="kotoba1">
                  <h3>質問したい人を選択して、</h3>
                  <h3>質問する際の注意事項などを確認しましょう。</h3>
</div>
</div>
</div>
<?php
                    require_once '../db.php';
                    $db = new DB();
                    $dbh = $db->dbConect();

                  $sql='SELECT year,member. code,name FROM member';
                  $stmt=$dbh->prepare($sql);
                  $stmt->execute();
                  $rec=$stmt->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);
                  $dbh=null;
                  ksort($rec);
//                ↑ https://kinocolog.com/pdo_fetch_pattern/ の下の方参照

//                登録がない場合はrecがないからIF。
?>
<div class="waku">
<?php
                  if(isset($rec)==true)
                  {
                      foreach ($rec as $key => $hito)
                      {
                            print '<fieldset>';
                            print '<legend>';
                            print $key.'期';
                            print '</legend>';

                            foreach ($hito as $year_member)
                            {
                                $code=$year_member['code'];
                                $name=$year_member['name'];
                                print '<a class="name" href="mypage.php?code='.$code.'">';
                                print $name;
                                print 'さん';
                                print '</a>';
                                print '<br>';
                            }

                      print '</fieldset>';

                      }
?></div>
<?php
                  }
                  else
                  {
                      print 'まだ登録がありません。';
                  }
}
?>
</main>
</body>
</html>
