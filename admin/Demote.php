<?php
if (strpos($message, "/fr") === 0 or strpos($message, "!fr") === 0 or strpos($message, ".fr") === 0) {
  if ($userId != '916264684') {
    $resp = "𝗥𝗲𝗾𝘂𝗶𝗿𝗲 𝗔𝗱𝗺𝗶𝗻 𝗣𝗿𝗶𝘃𝗶𝗹𝗮𝗴𝗲𝘀 ⚠️";
    reply_to($chatId, $resp, $message_id);
    exit();
  }
  $fr = substr($message, 4);
  $separa = explode(" ", $fr);
  $frid = $separa[0];
  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "SELECT role FROM persons WHERE userid='$chatId'";
  $result20 = mysqli_query($link, $sql);
  $json_array = [];
  while ($row = mysqli_fetch_assoc($result20)) {
    $json_array[] = $row;
  }
  $final201 = json_encode($json_array);
  $role = trim(strip_tags(getStr($final201, '"role":"', '"')));


  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "UPDATE persons SET role = 'FREE' WHERE persons.userid='$frid'";

  if (mysqli_query($link, $sql)) {
    $resultfr = "$frid 𝘀𝘂𝗰𝗰𝗲𝘀𝘀𝗳𝘂𝗹𝗹𝘆 𝗱𝗲𝗺𝗼𝘁𝗲𝗱 𝘁𝗼 𝗙𝗿𝗲𝗲 𝗨𝘀𝗲𝗿 ✅.";
    $umsg = urlencode("𝗛𝗘𝗬 𝗗𝗨𝗗𝗘 ! 
𝗨𝗡𝗙𝗢𝗥𝗧𝗨𝗡𝗔𝗧𝗘𝗟𝗬 𝗬𝗢𝗨𝗥 𝗔𝗖𝗖𝗢𝗨𝗡𝗧 𝗦𝗨𝗖𝗖𝗘𝗦𝗦𝗙𝗨𝗟𝗟𝗬 𝗗𝗘𝗠𝗢𝗧𝗘𝗗 𝗧𝗢 '𝗙𝗥𝗘𝗘' 𝗨𝗦𝗘𝗥 ✅");
    reply_to($chatId, $resultfr, $message_id);
    send_to($frid, $umsg);
  } else {
    $resultfr = "Something Went Error";
    reply_to($chatId, $resultfr, $message_id);
  }
}
