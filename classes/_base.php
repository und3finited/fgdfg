<?php

if (strpos($message, "/register") === 0 or strpos($message, "!register") === 0 or strpos($message, ".register") === 0) {
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
    $respchat = "PREMIUM REQUIRED,CONTACT @ASUR_SINCHAN.";
    reply_to($chatId, $respchat, $message_id);
    exit();
  }

  if (empty($username)) {
    $username = "null";
  }

  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
  $sql = "INSERT INTO persons (userid, role, username, credits) VALUES ('$userId', 'FREE', '$username', '50')";
  $err = mysqli_error($link);
  if (mysqli_query($link, $sql)) {
    $result = "
✮Registeration Done✅,TYPE /cmds To Check cmds
";
  } else {
    $result = "
✮Already Registered!,TYPE /cmds To Check cmds";
  }

  reply_to($chatId, $result, $message_id);
}
