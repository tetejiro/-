<?php

//            mail
              $honbun='';
              $honbun.=$whosename."さんから、\n";
              $honbun.=$name."さんに質問したいことがあります。\n";
              $honbun.="内容は以下の通りです。\n";
              $honbun.="\n\n";
              $honbun.="----------------------------\n";
              $honbun.="〇状況説明\n";
              $honbun.=$situation."\n\n";
              $honbun.="〇どんな状態にしたいのか。\n";
              $honbun.="$goal\n\n";
              $honbun.="〇できないところ\n";
              $honbun.=$what."\n\n";
              $honbun.="〇自分ではどう考えたか\n";
              $honbun.="$why\n\n";
              $honbun.="〇試してみたこと・その他\n";
              $honbun.=$try."\n\n";
              $honbun.="----------------------------\n";
              $honbun.="お手すきの際に、対応していただけますと嬉しいです。\n\n";

              $title='質問のお知らせです。';
              $header='From:shitumon@shitai.co.jp';
              $honbun=html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
              mb_language('Japanese');
              mb_internal_encoding('UTF-8');
              mb_send_mail($mail,$title,$honbun,$header);

?>
