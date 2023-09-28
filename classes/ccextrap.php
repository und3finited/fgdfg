<?php
if (strpos($message, '.cxt') === 0 or strpos($message, '/cxt') === 0 or strpos($message, '.cxt') === 0) {
  //------------GROUP AUTHORIED SECTION-----/
  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "SELECT * FROM chatauth WHERE chatsid='$chatId'";
  $result = mysqli_query($link, $sql);
  $json_array = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
  }
  $fchatid = json_encode($json_array);
  $achat = trim(strip_tags(getStr($fchatid, '"chatsid":"', '"')));
  if ($achat != $chatId and $ctype == "supergroup") {
    $respchat = "PREMIUM REQUIRED! CONTACT @ASUR_SINCHAN";
    reply_to($chatId, $respchat, $message_id);
    exit();
  }
  //----------PERSONAL ACCESS--------------/
  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "SELECT role FROM persons WHERE userid='$userId'";
  $result20 = mysqli_query($link, $sql);
  $json_array = [];
  while ($row = mysqli_fetch_assoc($result20)) {
    $json_array[] = $row;
  }
  $final201 = json_encode($json_array);
  $role = trim(strip_tags(getStr($final201, '"role":"', '"')));
  if ($chatId == $userId and $role == 'FREE') {
    $pers = "PREMIUM REQUIRED! CONTACT @ASUR_SINCHAN";
    reply_to($chatId, $pers, $message_id);
    exit();
  } elseif (empty($role)) {
    reply_to($chatId, $noregister, $message_id);
    exit();
  }
  //-----------CREDITS CHECK SECTION----------/
  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "SELECT credits FROM persons WHERE userid='$userId'";
  $result = mysqli_query($link, $sql);
  $json_array = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
  }
  $final2 = json_encode($json_array);
  $client = trim(strip_tags(getStr($final2, '"credits":"', '"')));
  mysqli_close($link);
  if ($client < 5) {
    reply_to($chatId, $message_id, $keyboard, $nocredits);
    exit();
  } elseif (empty($client)) {
    reply_to($chatId, $message_id, $keyboard, $noregister);
    exit();
  }

  $lista = substr($message, 5);
  $lista = clean($lista);
  $check = strlen($lista);
  $chem = substr($lista, 0, 1);
  $cc = multiexplode(array(":", "/", " ", "|", ""), $lista)[0];
  $mes = multiexplode(array(":", "/", " ", "|", ""), $lista)[1];
  $ano = multiexplode(array(":", "/", " ", "|", ""), $lista)[2];
  $cvv = multiexplode(array(":", "/", " ", "|", ""), $lista)[3];
  $strlenn = strlen($cc);
  $strlen1 = strlen($mes);
  $ano1 = $ano;
  $list = '' . $cc . '|' . $mes . '|' . $ano . '|' . $cvv . '';
  $vaut = array(1, 2, 7, 8, 9, 0);
  if (in_array($chem, $vaut)) {
    reply_to($chatId, $validauth, $message_id);
    exit();
  }
  if (empty($lista)) {
    reply_to($chatId, $validauth, $message_id);
    exit();
  } elseif ($check < 15) {
    reply_to($chatId, $validauth, $message_id);
    exit();
  } elseif (strlen($strlenn != 16)) {
    reply_to($chatId, $validauth, $message_id);
    exit();
  }
  $editsms = "TRYING WAIT...";
  $sss = reply_to($chatId, $editsms, $message_id);

  $respon = json_decode($sss, TRUE);

  $message_id_1 = $respon['result']['message_id'];

  if (strlen($strlen1 > 2)) {
    $ano = $cvv;
    $cvv = $mes;
    $mes = $ano1;
  }
  $ccex = substr("$cc", 0, 12);
  $mesex = substr("$mes", 0, 2);
  $ano1 = substr($yyyy, 2, 4);
  $anoex = substr("$ano", 0, 4);
  $extra = 'xxxx';
  $wb = "$ccex" . $extra;
  error_reporting(0);



  $trap = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮DONE,Created✅️ 
✮Extrap-»<code>$wb|$mesex|$anoex|xxx</code>  
✮CARD-»$cc|$mes|$ano|$cvv 
✮CREATED BY-»<a href='tg://user?id=$userId'>$firstname</a> [ $role ] 
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮ᴏᴡɴᴇʀ -» @asur_sinchan");
  edit_message($chatId, $trap, $message_id_1);
}
