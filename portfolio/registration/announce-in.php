<?php

$content=$_POST['content'];

try
{
    require_once '../db.php';
    $db = new DB();
    $dbh = $db->dbConect();

    $sql='INSERT INTO announce(content) VALUES(?)';
    $stmt=$dbh->prepare($sql);
    $data[]=$content;
    $stmt->execute($data);
    $dbh=null;

    header('Location:announce.php');

}
catch(\Exception $e)
{
    print '障害により記録できませんでした。';
    print '<a href="index.php">もどる</a>';
}

?>
