<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインできていません。<br><br>';
    print '<a href="../registartion/login.html">ログインへ</a>';
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
  <link rel="stylesheet" href="../css/mylist.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
  <link rel="icon" type="image/png" href="../favicon/p-favicon.png">
  </head>
  <body>
            <h3><img src="../favicon/p-favicon.png"> 過去のほうれんそう・質問リスト</h3><br>
  <div class="zentai">
<?php
            $honnin=$_SESSION['code'];

            require_once '../db.php';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql="SELECT nitizi,whose,whom,situation,goal,what,why,try0
                  FROM question WHERE whose=$honnin";
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
            $rec=$stmt->fetchAll(PDO::FETCH_ASSOC);

            if(isset($rec)==true)
            {
            $count=count($rec);

            for ($i=0; $i < $count; $i++)
            {
                $sql="SELECT nitizi,whose,whom,situation,goal,what,why,try0
                      FROM question WHERE whose=$honnin";
                $stmt=$dbh->prepare($sql);
                $stmt->execute();
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);

                $nitizi[$i]=$rec['nitizi'];
                $whom[$i]=$rec['whom'];
                $situation[$i]=$rec['situation'];
                $goal[$i]=$rec['goal'];
                $what[$i]=$rec['what'];
                $why[$i]=$rec['why'];
                $try[$i]=$rec['try0'];

                $sql="SELECT name FROM member WHERE code=$whom[$i]";
                $stmt=$dbh->prepare($sql);
                $stmt->execute();
                $rec2=$stmt->fetch(PDO::FETCH_ASSOC);

                $name[$i]=$rec2['name'];
?>
<div class="zentai2">
  <p><?php print $i+1; ?></p>
<div class="zentai3">
                  <table>
                  <tr>
                    <th>時間</th><td><?php print $nitizi[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>質問相手</th><td><?php print $name[$i]; ?>さん</td>
                  </tr>
                  <tr>
                    <th>状況</th><td><?php print $situation[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>ゴール</th><td><?php print $goal[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>問題・内容</th><td><?php print $what[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>自分の意見</th><td><?php print $why[$i]; ?></td>
                  </tr>
                  <tr>
                    <th>試したこと・その他</th><td><?php print $try[$i]; ?></td>
                  </tr>
                </table><br><br>
</div>
</div>
<?php       }
            $dbh=null;
?>
            <a href="../mypage/mypage.php?code=<?php print $honnin; ?>">もどる</a>
</div>
</body>
</html>
<?php     }
          else
          {
              print '<link rel="stylesheet" href="../css/mannaka.css">';
              print '<div class=mi>';
              print '<br>まだしつもん・ほうれんそうをしていません。<br>';
              print '<a href="../mypage/mypage.php?code=<?php print $honnin; ?>">もどる</a>';
              print '</div>';
          }
}
