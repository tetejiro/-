<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">

<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="../css/announce.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../p-favicon.png">
</head>
<body>
<div class="box">
<div class="title">
                <?php
                    date_default_timezone_set('Asia/Tokyo');
                    $date=date("Y n/j G:i",time());
                    ?>
                    <p><?php print $date; ?></p>
                    <p>周知内容</p>
                    <p class="kakusu">周知内容を記載</p>
</div>
                <form action="announce-in.php" method="post">
                  <textarea class="waku" name="content" rows="8" cols="80"></textarea><br><br><br>
                  <input class="toroku" type="submit" value="登  録">
                </form><br><br>
                <a href="index.php">もどる</a>
</div>
</body>
</html>
