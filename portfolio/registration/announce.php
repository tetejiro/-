<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta title="しつもん">
    <meta name="viewport" content="width=device-width,initial-scale=1">

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
      </div>
          <form action="announce-in.php" method="post">
              <textarea name="content" rows="8" cols="50"
                        placeholder="周知事項を記載してください。"></textarea><br>
      <div class="button">
              <input type="submit" value="登  録">
          </form>
          <a href="index.php">もどる</a>
      </div>
    </div>
  </body>
</html>
