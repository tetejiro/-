<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
    print 'ログインできていません。';
    print '<a href="../registration/login.html">ログインへ</a>';
}
else
{

              $honnin=$_SESSION['name'];

//            mail
              $honbun='';
              $honbun.=$honnin."さんから、\n";
              $honbun.=$name."さんに質問したいことがあります。\n";
              $honbun.='内容は以下の通りです。'"\n";
              $honbun.="\n\n";
              $honbun.='----------------------------';
              $honbun.='状況説明'"\n";
              $honbun.=$situation."\n";
              $honbun.='どんな状態にしたいのか。';
              $honbun.=$goal;
              $honbun.='できないところ'."\n";
              $honbun.=$what."\n";
              $honbun.='自分ではどう考えたか'"\n";
              $honbun.=$why;
              $honbun.='試してみたこと・その他'"\n";
              $honbun.=$try."\n";
              $honbun.='----------------------------'"\n";
              $honbun.='お手すきの際に、対応していただけますと嬉しいです。'."/n/n";

              $title='質問のお知らせです。';
              $header='From:shitumon@shitai.co.jp';
              $honbun=html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
              mb_language('Japanese');
              mb_internal_encoding('UTF-8');
              mb_send_mail($mail,$title,$honbun,$header);
}
?>
