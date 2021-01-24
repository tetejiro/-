<?php

session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false)
{
  print 'ログインしてください。';
  print '<a href="../registration/login.html">ログインページへ</a>';
}

else
{

                  print '<h3>質問したい人を選択しましょう。</h3>';
                  print '<h3>質問する際の注意事項などを確認しましょう。</h3><br>';

                  require_once '../db.php';
                  $dbh=new PDO($dsn,$user,$password);
                  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                  $sql='SELECT year,member. code,name FROM member';
                  $stmt=$dbh->prepare($sql);
                  $stmt->execute();
                  $rec=$stmt->fetchAll(PDO::FETCH_ASSOC|PDO::FETCH_GROUP);
                  $dbh=null;
//                ↑ https://kinocolog.com/pdo_fetch_pattern/ の下の方参照

//                登録がない場合はrecがないからIF。
                  if(isset($rec)==true)
                  {
                      foreach ($rec as $key => $year)
                      {
                            print '<fieldset>';
                            print '<legend>';
                            print $year.'期';
                            print '</legend>';

                            foreach ($year as $key => $year_member)
                            {
                                $code=$year_member['code'];
                                $name=$year_member['name'];
                                print '<a href="mypage.php?code='.$code.'">';
                                print $name;
                                print 'さん';
                                print '</a>';
                                print '<br>';
                            }

                      print '</fieldset>';

                      }
                  }

                  else
                  {
                      print 'まだ登録がありません。';
                  }

?>
