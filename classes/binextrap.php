<?php
if (strpos($message, '.ex') === 0 or strpos($message, '/ex') === 0 or strpos($message, '.ex') === 0) {
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
    $pers = "PREMIUM REQUIRED!CONTACT @ASUR_SINCHAN OR /buy";
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


  function random_strings($length_of_string)
  {
    $str_result = '0123456789';
    return substr(str_shuffle($str_result),   0, $length_of_string);
  }
  function mes_strings($length_of_string)
  {
    $str_result = '123456789';
    return substr(str_shuffle($str_result),   0, $length_of_string);
  }
  function ano_strings($length_of_string)
  {
    $str_result = '23456789';
    return substr(str_shuffle($str_result),   0, $length_of_string);
  }
  $test = '' . random_strings(6) . '';
  $binlista = substr($message, 4);
  $bincut = substr("$binlista", 0, 6);
  $ccextrap = '' . random_strings(6) . 'xxxx';
  $extra = 'xxxx';
  $binexcc = "$bincut" . $ccextrap;
  $binexmes = '0' . mes_strings(1) . '';
  $binexano = '2' . ano_strings(1) . '';
  error_reporting(0);


  $binlista = clean($binlista);
  $nobinalert = "INVALID BIN!";
  if (empty($binlista)) {
    reply_to($chatId, $nobinalert, $message_id);
    exit();
  } elseif (strlen($binlista < 6)) {
    reply_to($chatId, $nobinalert, $message_id);
    
    exit();
  }
  $editsms = "TRYING WAIT!..... ";
  $sss = reply_to($chatId, $editsms, $message_id);

  $respon = json_decode($sss, TRUE);

  $message_id_1 = $respon['result']['message_id'];

  $binmsg = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮DONE,Created✅️ 
✮Extrap-»<code>$binexcc|$binexmes|$binexano|xxx</code>  
✮BIN-»$binlista
✮CREATED BY-»<a href='tg://user?id=$userId'>$firstname</a> [ $role ] 
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮ᴏᴡɴᴇʀ -» @asur_sinchan");
  edit_message($chatId, $binmsg, $message_id_1);
}
