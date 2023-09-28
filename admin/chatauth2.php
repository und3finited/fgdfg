<?php

if (strpos($message, "/ads") === 0 or strpos($message, "!ads") === 0 or strpos($message, ".ads") === 0) {
  if ($userId != '5545098876') {
    $resp = "𝗥𝗲𝗾𝘂𝗶𝗿𝗲 𝗔𝗱𝗺𝗶𝗻 𝗣𝗿𝗶𝘃𝗶𝗹𝗮𝗴𝗲𝘀 ⚠️";
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
