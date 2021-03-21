<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
</head>
<main>
クラスでテキストボックスを作る。
<?php
    require_once 'otameshi0.php';
    $textarea = new Textarea;
    $textarea->textform();

    $DB = new DB();
    $rec = $DB->dbSelect();
    print '<pre>';
    print_r ($rec);
    print '</pre>';
?>
</main>
