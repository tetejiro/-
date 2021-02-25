<?php
//            mail
              $honbun='';
              $honbun.=$whosename."さんから、\n";
              $honbun.=$name."さん宛てにほうれんそうが入りました。\n";
              $honbun.="内容は以下の通りです。\n";
              $honbun.="\n\n";
              $honbun.="----------------------------\n";
              $honbun.="〇今回のほうれんそうの目的\n";
              $honbun.=$goal."\n\n";
              $honbun.="〇前提状況\n";
              $honbun.=$situation."\n\n";
              $honbun.="〇相談内容\n";
              $honbun.=$what."\n\n";
              $honbun.="〇自分ではどう考えたか\n";
              $honbun.=$why."\n\n";
              $honbun.="〇その他\n";
              $honbun.=$try."\n\n";
              $honbun.="----------------------------\n\n";
              $honbun.="お手すきの際に、対応していただけますと嬉しいです。\n\n";

              $title='ほうれんそうのお知らせです。';
              $header='From:shitumon@shitai.co.jp';
              $honbun=html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
              mb_language('Japanese');
              mb_internal_encoding('UTF-8');
              mb_send_mail($mail,$title,$honbun,$header);

?>
