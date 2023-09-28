<?php

if (strpos($message, "/add") === 0 or strpos($message, "!add") === 0 or strpos($message, ".add") === 0) {
  if ($userId != '916264684') {
    $resp = "𝗧𝗢 𝗔𝗗𝗗 𝗧𝗛𝗜𝗦 𝗕𝗢𝗧 𝗧𝗢 𝗬𝗢𝗨𝗥 𝗚𝗥𝗢𝗨𝗣 -
 
    ⚠️⚠️ 𝗬𝗢𝗨𝗥 𝗚𝗥𝗢𝗨𝗣 𝗠𝗨𝗦𝗧 𝗕𝗘 𝗔𝗧𝗟𝗘𝗔𝗦𝗧 𝟱𝟬+ 𝗠𝗘𝗠𝗕𝗘𝗥𝗦 ⚠️⚠️
     
    𝔻𝕄 𝕋𝕆 𝔹𝕌𝕐 - @ASUR_SINCHAN and @predator_am";
    reply_to($chatId, $resp, $message_id);
    exit();
  }

  $achat = substr($message, 5);

  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "INSERT INTO chatauth (chatsid, stts) VALUES ('$achat', 'APPROVED')";
  $err = mysqli_error($link);
  if (mysqli_query($link, $sql)) {
    $result = "𝗚𝗿𝗼𝘂𝗽 𝗔𝘂𝘁𝗵𝗼𝗿𝗶𝘀𝗲𝗱 ✅";
  } else {
    $result = "𝗔𝗹𝗿𝗲𝗮𝗱𝘆 𝗔𝘂𝘁𝗵𝗼𝗿𝗶𝘀𝗲𝗱 ⚠️";
  }

  reply_to($chatId, $result, $message_id);
}
