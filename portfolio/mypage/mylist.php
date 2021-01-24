<?php
session_start();
session_regenerate_id(true);
if(($_SESSION['login'])==false)
{
    print 'ログインできていません。<br><br>';
    print '<a href="../registartion/login.html">ログインへ</a>';
}
else {
            print '過去のほうれんそう・質問リスト';
            print '<br><br><br>';
            $code=$_SESSION['code'];

            require_once '../db.php';
            $dbh=new PDO($dsn,$user,$password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql='SELECT * FROM now WHERE code=?'
            $stmt=$dbh->prepare($sql);
            $data[]=$code;
            $stmt->execute($data);
            $rec=$stmt->fetchAll(PDO::FETCH_ASSOC);

            $situation=$rec['situation'];
            $goal=$rec['goal'];
            $what=$rec['what'];
            $why=$rec['why'];
            $try=$rec['try'];
?>
            <table>
              <tr>
                <th>状況</th><td><?php $situation ?></td>
              </tr>
              <tr>
                <th>ゴール</th><td><?php $goal ?></td>
              </tr>
              <tr>
                <th>問題・内容</th><td><?php $what ?></td>
              </tr>
              <tr>
                <th>自分の意見</th><td><?php $why ?></td>
              </tr>
              <tr>
                <th>試したこと・その他</th><td><?php $try ?></td>
              </tr>
            </table>
<?php
}
?>
