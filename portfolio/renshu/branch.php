<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>WCB Cafe - CONTACT</title>
        <meta name="description" content="ブレンドコーヒーとヘルシーなオーガニックフードを提供するカフェ">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
    <?php
        function sanitize($before)
        {
            $after = htmlspecialchars($before, ENT_QUOTES, 'UTF-8');
            return $after;
        }

        $messages = sanitize($_POST['your-message']);
        $names = sanitize($_POST['your-name']);
        $mails = sanitize($_POST['your-email']);

        $okflg = 0;
        if($messages == '')
        {
            $okflg = 1;
            print 'メッセージが入力されていません<br>';
        }
        if(mb_strlen($messages) > 10)
        {
            $okflg = 1;
            print 'メッセージ内容は10文字以内にしてください。<br>';
        }

        if($names == '')
        {
            $okflg = 1;
            print '名前が入力されていません。<br>';
        }

        if($mails == '')
        {
            $okflg = 1;
            print 'メールアドレスを入力されていません。<br>';
        }

        if($okflg == 1)
        {
            print '<a href="./contact.php">もどる</a>';
        }
        else
        {
            require_once 'const.php';
            $ConstDb = new ConstDb();
            $dsn = ConstDb::dsn;
            $user = ConstDb::user;
            $password = ConstDb::password;
            try
            {
                require_once 'db.php';
                $HandleDb = new HandleDb();
                $dbh = $HandleDb->ConectDb($dsn, $user, $password);

                $HandleDb->InsertDb($messages, $names, $mails);
            }
            catch(\Exception $e)
            {
                var_dump($e);
                print 'エラー';
            }
        }

    ?>
    </body>
</html>