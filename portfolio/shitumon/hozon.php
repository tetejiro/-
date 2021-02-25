<?php
session_start();
session_regenerate_id(true);
          if(isset($_SESSION)==false)
          {
            print 'ログインしてください。';
            print '<a href="../registration/login.php">ログインへ</a>';
          }
          else
          {
            //内容チェック（空がないか）
            $okflg=true;
            if(empty($_POST['situation'])==true)
            {
                $okflg=false;
            }
            if(empty($_POST['goal'])==true)
            {
                $okflg=false;
            }
            if(empty($_POST['what'])==true)
            {
                $okflg=false;
            }
            if(empty($_POST['why'])==true)
            {
                $okflg=false;
            }

            if ($okflg==false)
            {
                print '空欄があります。その他以外は全て記入してください。';
                print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
            }
            else
            {
                  //質問相手のコード
                  $code=$_POST['code'];
                  //自分のコード
                  $honnin=$_SESSION['code'];

                  require_once '../hensu.php';
                  $post=sanitize($_POST);
                  $situation=$post['situation'];
                  $goal=$post['goal'];
                  $what=$post['what'];
                  $why=$post['why'];
                  $try=$post['try'];

                  try
                  {
                        require_once '../db.php';
                        $dbh=new PDO($dsn,$user,$password);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                        $sql='INSERT INTO question (whose,whom,situation,goal,what,why,try0)
                                     VALUES (?,?,?,?,?,?,?)';
                        $stmt=$dbh->prepare($sql);
                        $data=array();
                        $data[]=$honnin;
                        $data[]=$code;
                        $data[]=$situation;
                        $data[]=$goal;
                        $data[]=$what;
                        $data[]=$why;
                        $data[]=$try;
                        $stmt->execute($data);
                        $dbh=null;

                        $_SESSION['whose']=$honnin;
                        $_SESSION['whom']=$code;
                        $_SESSION['situation']=$situation;
                        $_SESSION['goal']=$goal;
                        $_SESSION['what']=$what;
                        $_SESSION['why']=$why;
                        $_SESSION['try']=$try;

                        header('Location:done.php');

                  }

                  catch (\Exception $e)
                  {
                      var_dump($e);
                      print '現在障害発生中です。';
                      print '<a href="../registration/index.php">もどる</a>';
                  }
            }
          }

?>
