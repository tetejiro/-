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
                    date_default_timezone_set('Asia/Tokyo');
                    $date=date("Y n j G:i",time());
                    print $date;
                ?>

                <form action="announce-in.php" method="post">
                  周知内容<br>
                  <textarea name="content" rows="8" cols="80"></textarea>
                  <input type="submit" value="登録">
                </form>
                <a href="index.php">もどる</a>
</body>
</html>
