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
            if (isset($_POST)==false)
            {
                $okflg=false;
                print '16';
            }
            if (isset($_POST['situation'])==false)
            {
                $okflg=false;
                print '21';
            }
            if (isset($_POST['goal'])==false)
            {
                $okflg=false;
                print $goal;
            }
            if (isset($_POST['what'])==false)
            {
                $okflg=false;
            }
            if (isset($_POST['why'])==false)
            {
                $okflg=false;
            }
            if (isset($_POST['try'])==false)
            {
                $okflg=false;
            }

            if ($okflg==false)
            {
                print '空欄があります。記入してください。';
                print '<form><input type="button" onclick="history.back()" value="戻る"></form>';
            }
            else
            {
                  //質問相手のコード
                  $code=$_POST['code'];
                  //自分のコード
                  $honnin=$_SESSION['code'];

                  $post=$_POST;
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

                        print '72';
                        $honnin=$_SESSION['code'];
                        $sql='INSERT INTO question(situation,goal,what,why,try) VALUES(?,?,?,?,?) WHERE code=?';
                        $stmt=$dbh->prepare($sql);
                        print '78';
                        $data[]=$situation;
                        $data[]=$goal;
                        $data[]=$what;
                        $data[]=$why;
                        $data[]=$try;
                        print '84';
                        $data[]=$honnin;
                        $stmt->execute($data);
                        $dbh=null;
                        print '82';

                        print '<form action="done.php" method="post">';
                        print '<input type="hidden" name="situation" value="'.$situation.'">';
                        print '<input type="hidden" name="goal" value="'.$goal.'">';
                        print '<input type="hidden" name="what" value="'.$what.'">';
                        print '<input type="hidden" name="why" value="'.$why.'">';
                        print '<input type="hidden" name="try" value="'.$try.'">';
                        print '<input type="hidden" name="code" value="'.$code.'">';
                        print '</form>';

                        header('Location:done.php');

                  }

                  catch (\Exception $e)
                  {
                      print '現在障害発生中です。';
                      print '<a href="../registration/index.php">もどる</a>';
                  }



            }
          }

?>
