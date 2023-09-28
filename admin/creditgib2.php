<?php
if(strpos($message, "/as")===0 or strpos($message, "!as")===0 or strpos($message, ".as")===0){
  if($userId != '5545098876'){
    $resp = " 𝗥𝗲𝗾𝘂𝗶𝗿𝗲 𝗔𝗱𝗺𝗶𝗻 𝗣𝗿𝗶𝘃𝗶𝗹𝗮𝗴𝗲𝘀 ⚠️";
    reply_to($chatId,$resp,$message_id);
exit();
  }
  $crd = substr($message, 4);
  $separa = explode(" ", $crd);
  $amtcrd = $separa[0];
  $cid = $separa[1];
  
$link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "SELECT credits FROM persons WHERE userid='$cid'";
    $result = mysqli_query($link, $sql);
    $json_array = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $json_array[] = $row;
    }
    $final2 = json_encode($json_array);
    $client = trim(strip_tags(getStr($final2, '"credits":"','"')));
mysqli_close($link);
    $balance = $client + $amtcrd;

$link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "UPDATE persons SET credits = '$balance' WHERE persons.userid='$cid'";
    if(mysqli_query($link, $sql)){
    $crdresult = "$amtcrd 𝗖𝗿𝗲𝗱𝗶𝘁 𝗔𝗱𝗱𝗲𝗱 𝗧𝗼 $cid 𝗦𝘂𝗰𝗰𝗲𝘀𝘀𝗳𝘂𝗹𝗹𝘆 ✅";
    $umsg = urlencode ("𝗖𝗼𝗻𝗴𝗿𝗮𝘁𝘀 ! 
𝗬𝗼𝘂𝗿 𝗔𝗰𝗰𝗼𝘂𝗻𝘁 𝗝𝘂𝘀𝘁 𝗚𝗼𝘁 $amtcrd 𝗖𝗿𝗲𝗱𝗶𝘁𝘀 ✅

𝗧𝘆𝗽𝗲 /credits 𝘁𝗼 𝗞𝗻𝗼𝘄 𝗬𝗼𝘂𝗿 𝗖𝘂𝗿𝗿𝗲𝗻𝘁 𝗖𝗿𝗲𝗱𝗶𝘁𝘀");
    reply_to($chatId,$crdresult,$message_id);
    send_to($cid,$umsg);
}else{
    $crdresult = "Something Went Error";
    reply_to($chatId,$crdresult,$message_id);
}
  
  
  

}
