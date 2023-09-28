<?php
if (strpos($message, "/ping") === 0 or strpos($message, "!ping") === 0 or strpos($message, ".gay") === 0) {
  if ($userId != '916264684') {
    $r = "0";
  } else {
    $r = rand(0, 100);
  }
  $result = urlencode("𝗛𝗲𝘆 <a href='tg://user?id=$userId'>$firstname</a> !

pong!


");
  reply_to($chatId, $result, $message_id);
}
