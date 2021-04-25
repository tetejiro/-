<?php
//require_once('libs/consts/AppConstants.php');
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login']) == false)
{
  print 'ログインしていません。';
  print '<a href="../registration/login.html">ログインへ</a>';
  exit();
}
else
{
  $rec = null;
      //自分のコード
      $honnin = $_SESSION['code'];
      //相手のコード
      if(isset($_GET['code']) == true)
      {
          $code = $_GET['code'];
      }
      else
      {
          $code = 0;
      }
      try
      {
          require_once '../new-db/new-select.php';
          $SelectDb = new SelectDb();

          //ログインか登録から。
          if(empty($_GET['code']) == true)
          {
              $rec = $SelectDb->selectDb4($honnin);
              $count = count($rec);
              if($count>0)
              {
                $rec = $rec[$count-1];
              }
              require_once './hozyo.php';
          }
          else
          {
              if($code==$honnin)
              {
                //リストから自分のマイページ
                $rec = $SelectDb->selectDb4($honnin);
                $count=count($rec);
                if($count>0)
                {
                  $rec=$rec[$count-1];
                }
                require_once './hozyo.php';
              }
              else
              {
                //リストから他の人のマイページ
                $rec = $SelectDb->selectDb5($code);
                $count = count($rec);
                if($count>0)
                {
                  $rec = $rec[$count-1];
                }
                require_once './hozyo.php';
              }
          }
      }
      catch (Exception $e)
      {
          print 'ただいま障害中です。<br>前回のデータを読み取れませんでした。<br>';
          exit ('<a href="../registration/index.php">もどる</a>');
      }
?>
<div class="header">
<div class="hidari">
              <a href="../registration/index.php">
                <img src="../favicon/p-favicon3.png" alt="?"><h1>しつもん</h1>
              </a>
</div>
                <!--登録orログインから。-->
<?php           if(empty($code)==true)
                {
                  print '<div class="migi">';
                  print $_SESSION['name'];
                  print 'さんのマイページ<br>今日も頑張ろう。';
                  print '</div>';
                }
                //member-listから。
                else
                {
                    try
                    {
                      //member-listから自分のマイページへ。
                      if($code == $honnin)
                      {
                        print '<div class="migi">';
                        print $_SESSION['name'];
                        print 'さんのマイページ<br>今日も頑張ろう。';
                        print '</div>';
                      }
                      //member-listから他の人のマイページへ。
                      else
                      {
/*                      $sql='SELECT name FROM member WHERE code=?';
                        $stmt=$dbh->prepare($sql);
                        $data[]=$code;
                        $stmt->execute($data);
                        $rec3=$stmt->fetch(PDO::FETCH_ASSOC);
                        $dbh=null;
                        print $rec3['name'];
*/
                        $rec = $SelectDb->selectDb52($code);
                        print '<div class="migi">';
                        print $rec['name'];
                        print 'さんのページ<br>注意書きによく目を通してしつもんしましょう。';
                        print '</div>';
                      }
                    }
                    catch (Exception $e)
                    {
                        print '<div class="migi">';
                        print '誰のマイページかわかりません。ログインしなおしてください。';
                        print '</div>';
                        var_dump($e);
                    }
                }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta title="しつもん">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- css -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
<link rel="stylesheet" href="../css/mypage.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+JP">
<link rel="icon" type="image/png" href="../favicon/p-favicon.png">
</head>
<body>
</div><!--.header-->
<nav>
  <?php
      if(empty($code)==true)
      {
          print '<p><label for="kousin">更新</label></p>';
      }
      if(empty($code)==false)
      {
          if($code==$honnin)
          {
              print '<p><label for="kousin">更新</label></p>';
          }
      }
  ?>
              <a href="../mypage/mylist.php">質問リスト</a>
              <a href="member-list.php">メンバーリスト</a>

<?php         if(empty($code)==false)
              {
                if ($code!==$honnin)
                {
                  print '<a href="select.php?code='.$code.'">しつもんする</a><br><br>';
                }
              }
?>
</nav>
              <form action="mypage-branch.php" method="post">
<div class="zenhan">
    <div class="zenhan1">
      <div class="now">
                  今は何をしていますか？ <br><br>
                  <textarea class="area" name="task">
                    <?php if(empty($task)==false){ print $task; } ?>
                  </textarea><br><br><br>
      </div><!--now-->
      <div class="time">
                  どれくらいかかりそうですか？ <br><br>
                  <input type="time" name="bytime1" value="<?php if(empty($bytime1)==false){ print $bytime1; } ?>">
                  ～
                  <input type="time" name="bytime2" value="<?php if(empty($bytime2)==false){ print $bytime2; } ?>">
                  <br><br><br>
        </div><!--time-->
    </div><!--zenhan1-->
    <div class="emotion">
                  <p>今日の気分は？</p><br>
        <div class="kibun">
                  <label><img src="../favicon/kao1.png"><br>
                    <input type="radio" name="emotion" value="余裕"
                      <?php
                      if (isset($emotion)==true)
                      {
                        if($emotion=='余裕'){ print 'checked'; }
                      }
                      ?> >余裕
                  </label>

                  <label><img src="../favicon/kao2.png"><br>
                    <input type="radio" name="emotion" value="普通"
                      <?php
                      if (isset($emotion)==true)
                      {
                        if($emotion=='普通'){ print 'checked'; }
                      }
                      ?> >普通
                  </label>

                  <label><img src="../favicon/kao3.png"><br>
                    <input type="radio" name="emotion" value="余裕がない"
                      <?php
                      if (isset($emotion)==true)
                      {
                        if($emotion=='余裕がない'){ print 'checked'; }
                      }
                      ?> >余裕がない
                  </label>

                  <label><img src="../favicon/kao4.png"><br>
                    <input type="radio" name="emotion" value="忙しい"
                      <?php
                      if (isset($emotion)==true)
                      {
                        if($emotion=='忙しい'){ print 'checked'; }
                      }
                      ?> >忙しい
                  </label>

                  <label><img src="../favicon/kao5.png"><br>
                    <input type="radio" name="emotion" value="手伝ってほしい"
                      <?php
                      if (isset($emotion)==true)
                      {
                        if($emotion=='手伝ってほしい'){ print 'checked'; }
                      }
                      ?> >手伝ってほしい
                  </label>
        </div><!--kibun-->
      </div><!--emotion-->
</div><!--zenhan-->
<div class="kouhan">
  <div class="kohan1">
    <div class="zikan">
                都合がいい時間 <br><br>
                <input type="time" name="time1" value="<?php if(empty($time1)==false){ print $time1; } ?>">
                ～
                <input type="time" name="time2" value="<?php if(empty($time2)==false){ print $time2; } ?>">
                <br><br><br>
      </div><!--zikan-->
    <div class="tyui">
                質問時の注意事項 <br><br>
                <textarea
                class="area" name="attention" placeholder="※質問する前に見ておいてほしいことを書いてください。"><?php
                if(isset($attention)==true){ print $attention; } ?>
                </textarea><br><br>
      </div><!--tyui-->
  </div><!--kohan1-->
<div class="makasete">
                ここは私に任せて！ <br><br><br>
<div class="makasete1">
                1<br>
                  <textarea class="a area" type="text" name="strong1"><?php if(empty($strong1)==false){ print $strong1; } ?>
                  </textarea><br>
                2<br>
                  <textarea class="b area" type="text" name="strong2"><?php if(empty($strong2)==false){ print $strong2; } ?>
                  </textarea><br>
                3<br>
                  <textarea class="c area" type="text" name="strong3"><?php if(empty($strong3)==false){ print $strong3; } ?>
                  </textarea><br><br>
                  <input type="hidden" name="code" value="<?php print $code; ?>">
</div><!--makasete1-->
</div><!--makasete-->
</div><!--zenhan-->
<div class="navzentai">
<div class="nav2">
<?php
                if(empty($code)==true)
                {
                    print '<p><input id="kousin" type="submit" value="更新"></p>';
                    print '</form>';
                }
                else
                {
                    if($code==$honnin)
                    {
                        print '<p><input id="kousin" type="submit" value="更新する"></p>';
                        print '</form>';
                    }
                }

                print '<p><a href="../mypage/mylist.php">質問リスト</a></p>';
                print '<p><a href="member-list.php">メンバーリスト</a></p>';

                if(empty($code)==false)
                {
                  if ($code!==$honnin)
                  {
?>                   <p><a id="shitu" href="select.php?code=<?php print $code; ?>">しつもんする</a></p>
<?php             }
                }
?>
</div><!--nav2-->
</div><!--navzentai-->
</body>
</html>
<?php
}
