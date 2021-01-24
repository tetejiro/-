<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>しつもん</title>
<meta name="description" content="しつもんするための便利なツール。しつもん上手になって安心して業務に取り組もう。">

<!-- css -->
<link rel="stylesheet" href="https:unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="index.css">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
<link rel="icon" type="image/png" href="../p-favicon.png">

      <!-- cssのときは、.wf-notosansjapanese { font-family: "Noto Sans JP"; } -->
</head>
<body>
          <ul>
            <li><a href="login.html">ログイン</a></li>
            <li><a href="registration.html">登録</a></li>
<!--            <li><a href="../mypage/mypage.php">mypage</a></li>-->
          </ul>
          <h1>しつもんしよう。</h1>
          <p>最初はみんな
          <p>何もわからない。</p>
          <p>先輩に質問をしよう。</p>
          <p>正しい質問の仕方を身に着け、</p>
          <p>質問力を高めよう。</p>

          <?php
          require_once '../db.php';
          $dbh=new PDO($dsn,$user,$password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

          $sql='SELECT data,content FROM announce ORDER BY data DESC LIMIT 5';
          $stmt=$dbh->prepare($sql);
          $stmt->execute();
          $rec=$stmt->fetchAll(PDO::FETCH_ASSOC);
          $dbh=null;
          ?>

          <br>
          周知事項
          <?php foreach ($rec as $key => $value):
?>          <ul>
              <li> <?php print $value['data'] ?></li>
              <li><?php print $value['content'] ?></li>
            </ul>
          <?php endforeach; ?>

          <a href="announce.php">追加<br><img src="../haguruma.png" alt="追加"></a>
</body>
</html>
