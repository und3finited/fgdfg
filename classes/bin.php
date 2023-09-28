<?php
if (strpos($message, '!bin') === 0 or strpos($message, '/bin') === 0 or strpos($message, '.bin') === 0) {
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
    $respchat = "𝗨𝗻𝗮𝘂𝘁𝗵𝗼𝗿𝗶𝘀𝗲𝗱 𝗖𝗵𝗮𝘁 ⚠️.𝗖𝗼𝗻𝘁𝗮𝗰𝘁 @predator_am or @asur_sinchan 𝘁𝗼 𝗮𝘂𝘁𝗵𝗼𝗿𝗶𝘇𝗲.";
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
    $pers = "𝗢𝗡𝗟𝗬 𝗣𝗥𝗘𝗠𝗜𝗨𝗠 𝗠𝗘𝗠𝗕𝗘𝗥𝗦 𝗔𝗥𝗘 𝗔𝗟𝗟𝗢𝗪𝗘𝗗 𝗧𝗢 𝗨𝗦𝗘 𝗕𝗢𝗧 𝗜𝗡 𝗣𝗘𝗥𝗦𝗢𝗡𝗔𝗟 ⚠️. 𝗕𝘂𝘆 𝗣𝗿𝗲𝗺𝗶𝘂𝗺 𝘂𝘀𝗶𝗻𝗴 /buy";
    reply_to($chatId, $pers, $message_id);
    exit();
  } elseif (empty($role)) {
    reply_to($chatId, $noregister, $message_id);
    exit();
  }

  $flag = 'getFlags';
  $bin = substr($message, 5);
  $bin = clean($bin);
  $bin = substr($bin, 0, 6);
  $nobinalert = "𝗚𝗶𝘃𝗲 𝗺𝗲 𝗮 𝗩𝗮𝗹𝗶𝗱 𝗕𝗜𝗡 ⚠️";
  if (empty($bin)) {
    reply_to($chatId, $nobinalert, $message_id);
    exit();
  } elseif (strlen($bin < 6)) {
    reply_to($chatId, $nobinalert, $message_id);
    exit();
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'http://bins.su/');
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_POST, 1);
  $headers = array();
  $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
  $headers[] = 'Accept-Language: en-US,en;q=0.9';
  $headers[] = 'Cache-Control: max-age=0';
  $headers[] = 'Connection: keep-alive';
  $headers[] = 'Content-Type: application/x-www-form-urlencoded';
  $headers[] = 'Host: bins.su';
  $headers[] = 'Origin: http://bins.su';
  $headers[] = 'Referer: http://bins.su/';
  $headers[] = 'Upgrade-Insecure-Requests: 1';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins=' . $bin . '&bank=&country=');
  $result = curl_exec($ch);
  $bincap1 = trim(strip_tags(getStr($result, '<td>Bank</td></tr><tr><td>', '</td>')));
  $bincap2 = (getStr($result, '<td>' . $bincap1 . '</td><td>', '</td>'));
  $bincap3 = trim(strip_tags(getStr($result, '<td>' . $bincap2 . '</td><td>', '</td>')));
  $bincap4 = trim(strip_tags(getStr($result, '<td>' . $bincap3 . '</td><td>', '</td>')));
  $bincap5 = trim(strip_tags(getStr($result, '<td>' . $bincap4 . '</td><td>', '</td>')));
  $roldex = trim(strip_tags(getStr($result, '<td>' . $bincap5 . '</td><td>', '</td>')));
  // $flag = getFlags($bincap2);
  if (strpos($result, 'No bins found!')) {
    $nobin = "<b>❌BIN BANNED</b>";
    reply_to($chatId, $nobin, $message_id);
    exit();
  }
  $binresult = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮VALID BIN✅️ 
✮BIN-»<code>$bin</code> 
✮BRAND-»$bincap3
✮LEVEL-»$bincap4
✮TYPE-»$bincap5
✮BANK-»$roldex
✮COUNTRY-»$bincap2 {$flag($bincap2)}
✮Checked By-»<a href='tg://user?id=$userId'>$firstname</a> [ $role ] 
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮ᴏᴡɴᴇʀ -» @asur_sinchan");
  reply_to($chatId, $binresult, $message_id);
  exit();
}
