<?php

/*
１．インデックス表示
２．ログインページ表示
３．ログインできない⇒２．にもどる
４．ログインできた⇒マイページ
５．マイページを
*/

//ここのそもそもの出力の条件のリストが分からない。

class PrintPage{

  function getIndex():void{
    require_once './registration/index.php';
  }

  function getAnnounce():void{
    require_once './registration/announce.php';
  }

  function getLogin():void{
    require_once './registration/login.html';
  }

}


/*
//１．ログインしているかしていないか。
class Index{
  function Login($_POST){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
  }
}
*/