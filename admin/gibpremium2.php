<?php
if(strpos($message, "/pr")===0 or strpos($message, "!pr")===0 or strpos($message, ".pr")===0){
  if($userId != '5545098876'){
    $resp = "𝗥𝗲𝗾𝘂𝗶𝗿𝗲 𝗔𝗱𝗺𝗶𝗻 𝗣𝗿𝗶𝘃𝗶𝗹𝗮𝗴𝗲𝘀 ⚠️";
    reply_to($chatId,$resp,$message_id);
exit();
  }
  $prm = substr($message, 4);
$separa = explode(" ", $prm);
  $pmid = $separa[0];
$link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "SELECT role FROM persons WHERE userid='$chatId'";
    $result20 = mysqli_query($link, $sql);
    $json_array = [];
    while ($row = mysqli_fetch_assoc($result20)) {
      $json_array[] = $row;
    }
    $final201 = json_encode($json_array);
    $role = trim(strip_tags(getStr($final201, '"role":"','"')));
  
$link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "UPDATE persons SET role = 'PREMIUM' WHERE persons.userid='$pmid'";

    if(mysqli_query($link, $sql)){
    $presult = "$pmid 𝘀𝘂𝗰𝗰𝗲𝘀𝘀𝗳𝘂𝗹𝗹𝘆 𝘂𝗽𝗴𝗿𝗮𝗱𝗲𝗱 𝘁𝗼 𝗣𝗿𝗲𝗺𝗶𝘂𝗺 𝗨𝘀𝗲𝗿 ✅";
    $umsg = urlencode ("𝗛𝗘𝗬 𝗗𝗨𝗗𝗘 ! 
𝗬𝗢𝗨𝗥 𝗔𝗖𝗖𝗢𝗨𝗡𝗧 𝗦𝗨𝗖𝗖𝗘𝗦𝗦𝗙𝗨𝗟𝗟𝗬 𝗣𝗥𝗢𝗠𝗢𝗧𝗘𝗗 𝗧𝗢 '𝗣𝗥𝗘𝗠𝗜𝗨𝗠' 𝗨𝗦𝗘𝗥 ✅");
    reply_to($chatId,$presult,$message_id);
    send_to($pmid,$umsg);
}else{
    $presult = "Something Went Error";
    reply_to($chatId,$presult,$message_id);
}
  
 
  
  
  
}
