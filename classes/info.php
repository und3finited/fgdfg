<?php
if (strpos($message, "/buy") === 0 or strpos($message, "!buy") === 0 or strpos($message, ".buy") === 0) {

  reply_to($chatId, $buyit, $message_id);
}

if (strpos($message, "/info") === 0 or strpos($message, "!info") === 0 or strpos($message, ".info") === 0) {
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

  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);

  $sql = "SELECT role FROM persons WHERE userid='$userId'";
  $result20 = mysqli_query($link, $sql);
  $json_array = [];
  while ($row = mysqli_fetch_assoc($result20)) {
    $json_array[] = $row;
  }
  $final201 = json_encode($json_array);
  $bread = trim(strip_tags(getStr($final201, '"role":"', '"')));
  mysqli_close($link);
  if (empty($bread)) {
    $bread = "NOT REGISTERED";
  }

  $cmds13 = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮FIRST NAME-» $firstname
✮ID-» <code>$userId</code>
✮CREDITS -» $client 
✮USER PROFILE -» <a href='tg://user?id=$userId'>$firstname</a>
✮TYPE-» $bread
❆═══»ᴀꜱᴜʀ CHKV2«═══❆");

  reply_to($chatId, $cmds13, $message_id);
}


if (strpos($message, "/credits") === 0 or strpos($message, "!credits") === 0 or strpos($message, ".credits") === 0) {



  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);

  $sql = "SELECT role FROM persons WHERE userid='$userId'";
  $result20 = mysqli_query($link, $sql);
  $json_array = [];
  while ($row = mysqli_fetch_assoc($result20)) {
    $json_array[] = $row;
  }
  $final201 = json_encode($json_array);
  $bread = trim(strip_tags(getStr($final201, '"role":"', '"')));
  mysqli_close($link);
  $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);

  $sql = "SELECT credits FROM persons WHERE userid='$userId'";
  $result = mysqli_query($link, $sql);

  $json_array = [];


  while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
  }

  $final2 = json_encode($json_array);

  $client = trim(strip_tags(getStr($final2, '"credits":"', '"')));
  // sendMessage($chatId, $client);
  mysqli_close($link);

  if (empty($client)) {
    $cclient = urlencode("YOU SHOULD REGISTER FIRST /register");
  } else if ($client <= 0) {
    $cclient = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮PLAN-» $bread
✮CREDITS -» $client 
✮USER-» <a href='tg://user?id=$userId'>$firstname</a>
✮TYPE /buy TO PURCHASE MORE CREDITS
❆═══»ᴀꜱᴜʀ CHKV2«═══❆");
  }

  reply_to($chatId, $cclient, $message_id);
}

if (strpos($message, "/id") === 0 or strpos($message, "!id") === 0 or strpos($message, ".id") === 0) {


  $mtcmsg = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮YO <a href='tg://user?id=$userId'>$firstname</a> !
✮USER ID-» <code>$userId</code> 
✮CHAT ID-» <code>$chatId</code> 
❆═══»ᴀꜱᴜʀ CHKV2«═══❆");

  reply_to($chatId, $mtcmsg, $message_id);
}
