<?php

//mysql database info-----//
$host = "localhost";
$dbuser = "u511409495_CHKV2";
$dbpass = "Meghraj@9261";
$dbname = "u511409495_CHKV2";
//-----------////----////----///---///--+///
$validauth = urlencode("INVALID CC!");
$maintain = urlencode("UNDER MAINTANANCE");
$noregister = urlencode("YOUR ARE NOT REGISTERED TYPE /register TO CONTINUE");
$noreg = urlencode("YOUR ARE NOT REGISTERED TYPE /register TO CONTINUE");
$nocredits = urlencode("YOUR CREDITS ARE LOW! /buy MORE CREDITS.");
$buyit = urlencode("
❆═══»ᴀꜱᴜʀ«═══❆
✮/credits -»To Check Your Credits
✮1000 Credits + PREMIUM access - 5$
✮2000 Credits + PREMIUM access - 8$
✮4000 Credits + PREMIUM access - 12$
✮PAYMENT METHODS-:BTC,LTC,AMAZON GC,UPI
✮DM @ASUR_SINCHAN TO BUY
❆═══»ᴀꜱᴜʀ«═══❆");

$nopre = urlencode("PREMIUM REQUIRED TO USE THIS CMD. PURCHASE PREMIUM /buy TO USE THIS BOT.");
$webhook_url = 'https://api.telegram.org/bot5152228147:AAFlwFTsE_M2hgbioXdI-iPxTB2MRO0SyG8/setwebhook?url=https://chkv2.in/gift/index.php';
$botToken =  "5152228147:AAFlwFTsE_M2hgbioXdI-iPxTB2MRO0SyG8";
$website = "https://api.telegram.org/bot" . $botToken;
$update = file_get_contents('php://input');
echo $update;
$update = json_decode($update, TRUE);
global $website;
$e = print_r($update);
$ctype      = $update["message"]["chat"]["type"];
$username = $update["message"]["from"]["username"];
$chatId = $update["message"]["chat"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];

//-----------FILE LINK OPTION-------------//
foreach (glob("admin/*.php") as $filename) {
    include $filename;
}
foreach (glob("classes/*.php") as $filename) {
    include $filename;
}
if (file_exists(getcwd() . ('/cookie.txt'))) {
    @unlink('cookie.txt');
}
define('API_KEY', $botToken);
$link = mysqli_connect($host, $dbuser, $dbpass, $dbname);
//-----------SMS RELATED CMDS-----------------//
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot5152228147:AAFlwFTsE_M2hgbioXdI-iPxTB2MRO0SyG8/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}


function send_to($chatId, $message)
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $chatId . "&text=" . $message . "&parse_mode=HTML";
    return file_get_contents($url);
}
function reply_to($chatId, $message, $message_id)
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage?chat_id=" . $chatId . "&text=" . $message . "&reply_to_message_id=" . $message_id . "&parse_mode=HTML&disable_web_page_preview=true";
    return file_get_contents($url);
}

function edit_message($chatId, $message, $message_id)
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/editMessageText?chat_id=" . $chatId . "&text=" . $message . "&message_id=" . $message_id . "&parse_mode=HTML";
    file_get_contents($url);
}
#####################
function delete_message($chatId, $message_id)
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/deleteMessage?chat_id=" . $chatId . "&message_id=" . $message_id . "";
    file_get_contents($url);
}
#######################
function hits_to($mtc, $yehi)
{
    $url = "https://api.telegram.org/bot5152228147:AAFlwFTsE_M2hgbioXdI-iPxTB2MRO0SyG8/sendMessage?chat_id=" . $mtc . "&text=" . $yehi . "&parse_mode=HTML";
    return file_get_contents($url);
}
function editMessage($chatId, $message, $message_id)
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/editMessageText?chat_id=" . $chatId . "&message_id=" . $message_id . "&text=" . $message . "&parse_mode=HTML";
    $result = file_get_contents($url);
}
//-----------ENDED SMS RELATED CMDS------------//



function string_between_two_string($str, $starting_word, $ending_word)
{
    $subtring_start = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return substr($str, $subtring_start, $size);
}
function GetStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}
function g($l, $k, $p)
{
    return explode($p, explode($k, $l)[1])[0];
}

function Capture($str, $starting_word, $ending_word)
{
    $subtring_start  = strpos($str, $starting_word);
    $subtring_start += strlen($starting_word);
    $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
    return substr($str, $subtring_start, $size);
}

function value($str, $find_start, $find_end)
{
    $start = @strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str, $start + $length), $find_end);
    return trim(substr($str, $start + $length, $end));
}
function clean($string)
{
    $text = preg_replace("/\r|\n/", " ", $string);
    $str1 = preg_replace('/\s+/', ' ', $text);
    $str = preg_replace("/[^0-9]/", " ", $str1);
    $string = trim($str, " ");
    $lista = preg_replace('/\s+/', ' ', $string);
    return $lista;
}
function clean2($string)
{
    $text = preg_replace("/\r|\n/", "", $string);
    $str1 = preg_replace('/\s+/', ' ', $text);
    $str = preg_replace("/[^0-9]/", " ", $str1);
    $string = trim($str, " ");
    $lista = preg_replace('/\s+/', ' ', $string);
    // 
    return $lista;
}
function clean1($string)
{
    $str = preg_replace("/[^0-9]/", " ", $string);
    return $str;
}
function RemoveSpecialChar($str)
{
    $res = str_replace(array(
        '\'', '"',
        ',', ';', '<', '>', '.'
    ), '', $str);
    return $res;
}


function multiexplode($delimiters, $string)
{
    $one = str_replace($delimiters, $delimiters[0], $string);
    $two = explode($delimiters[0], $one);
    return $two;
}
function inStr($string, $start, $end, $value)
{
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
function mod($dividendo, $divisor)
{
    return round($dividendo - (floor($dividendo / $divisor) * $divisor));
}
function gibarray($message)
{
    // $cuted = substr($message, 6);
    return explode("\n", $message);
}
function getFlags($code)
{
    $code = strtoupper($code);
    if ($code == 'AD') return '🇦🇩';
    if ($code == 'AE') return '🇦🇪';
    if ($code == 'AF') return '🇦🇫';
    if ($code == 'AG') return '🇦🇬';
    if ($code == 'AI') return '🇦🇮';
    if ($code == 'AL') return '🇦🇱';
    if ($code == 'AM') return '🇦🇲';
    if ($code == 'AO') return '🇦🇴';
    if ($code == 'AQ') return '🇦🇶';
    if ($code == 'AR') return '🇦🇷';
    if ($code == 'AS') return '🇦🇸';
    if ($code == 'AT') return '🇦🇹';
    if ($code == 'AU') return '🇦🇺';
    if ($code == 'AW') return '🇦🇼';
    if ($code == 'AX') return '🇦🇽';
    if ($code == 'AZ') return '🇦🇿';
    if ($code == 'BA') return '🇧🇦';
    if ($code == 'BB') return '🇧🇧';
    if ($code == 'BD') return '🇧🇩';
    if ($code == 'BE') return '🇧🇪';
    if ($code == 'BF') return '🇧🇫';
    if ($code == 'BG') return '🇧🇬';
    if ($code == 'BH') return '🇧🇭';
    if ($code == 'BI') return '🇧🇮';
    if ($code == 'BJ') return '🇧🇯';
    if ($code == 'BL') return '🇧🇱';
    if ($code == 'BM') return '🇧🇲';
    if ($code == 'BN') return '🇧🇳';
    if ($code == 'BO') return '🇧🇴';
    if ($code == 'BQ') return '🇧🇶';
    if ($code == 'BR') return '🇧🇷';
    if ($code == 'BS') return '🇧🇸';
    if ($code == 'BT') return '🇧🇹';
    if ($code == 'BV') return '🇧🇻';
    if ($code == 'BW') return '🇧🇼';
    if ($code == 'BY') return '🇧🇾';
    if ($code == 'BZ') return '🇧🇿';
    if ($code == 'CA') return '🇨🇦';
    if ($code == 'CC') return '🇨🇨';
    if ($code == 'CD') return '🇨🇩';
    if ($code == 'CF') return '🇨🇫';
    if ($code == 'CG') return '🇨🇬';
    if ($code == 'CH') return '🇨🇭';
    if ($code == 'CI') return '🇨🇮';
    if ($code == 'CK') return '🇨🇰';
    if ($code == 'CL') return '🇨🇱';
    if ($code == 'CM') return '🇨🇲';
    if ($code == 'CN') return '🇨🇳';
    if ($code == 'CO') return '🇨🇴';
    if ($code == 'CR') return '🇨🇷';
    if ($code == 'CU') return '🇨🇺';
    if ($code == 'CV') return '🇨🇻';
    if ($code == 'CW') return '🇨🇼';
    if ($code == 'CX') return '🇨🇽';
    if ($code == 'CY') return '🇨🇾';
    if ($code == 'CZ') return '🇨🇿';
    if ($code == 'DE') return '🇩🇪';
    if ($code == 'DJ') return '🇩🇯';
    if ($code == 'DK') return '🇩🇰';
    if ($code == 'DM') return '🇩🇲';
    if ($code == 'DO') return '🇩🇴';
    if ($code == 'DZ') return '🇩🇿';
    if ($code == 'EC') return '🇪🇨';
    if ($code == 'EE') return '🇪🇪';
    if ($code == 'EG') return '🇪🇬';
    if ($code == 'EH') return '🇪🇭';
    if ($code == 'ER') return '🇪🇷';
    if ($code == 'ES') return '🇪🇸';
    if ($code == 'ET') return '🇪🇹';
    if ($code == 'FI') return '🇫🇮';
    if ($code == 'FJ') return '🇫🇯';
    if ($code == 'FK') return '🇫🇰';
    if ($code == 'FM') return '🇫🇲';
    if ($code == 'FO') return '🇫🇴';
    if ($code == 'FR') return '🇫🇷';
    if ($code == 'GA') return '🇬🇦';
    if ($code == 'GB') return '🇬🇧';
    if ($code == 'GD') return '🇬🇩';
    if ($code == 'GE') return '🇬🇪';
    if ($code == 'GF') return '🇬🇫';
    if ($code == 'GG') return '🇬🇬';
    if ($code == 'GH') return '🇬🇭';
    if ($code == 'GI') return '🇬🇮';
    if ($code == 'GL') return '🇬🇱';
    if ($code == 'GM') return '🇬🇲';
    if ($code == 'GN') return '🇬🇳';
    if ($code == 'GP') return '🇬🇵';
    if ($code == 'GQ') return '🇬🇶';
    if ($code == 'GR') return '🇬🇷';
    if ($code == 'GS') return '🇬🇸';
    if ($code == 'GT') return '🇬🇹';
    if ($code == 'GU') return '🇬🇺';
    if ($code == 'GW') return '🇬🇼';
    if ($code == 'GY') return '🇬🇾';
    if ($code == 'HK') return '🇭🇰';
    if ($code == 'HM') return '🇭🇲';
    if ($code == 'HN') return '🇭🇳';
    if ($code == 'HR') return '🇭🇷';
    if ($code == 'HT') return '🇭🇹';
    if ($code == 'HU') return '🇭🇺';
    if ($code == 'ID') return '🇮🇩';
    if ($code == 'IE') return '🇮🇪';
    if ($code == 'IL') return '🇮🇱';
    if ($code == 'IM') return '🇮🇲';
    if ($code == 'IN') return '🇮🇳';
    if ($code == 'IO') return '🇮🇴';
    if ($code == 'IQ') return '🇮🇶';
    if ($code == 'IR') return '🇮🇷';
    if ($code == 'IS') return '🇮🇸';
    if ($code == 'IT') return '🇮🇹';
    if ($code == 'JE') return '🇯🇪';
    if ($code == 'JM') return '🇯🇲';
    if ($code == 'JO') return '🇯🇴';
    if ($code == 'JP') return '🇯🇵';
    if ($code == 'KE') return '🇰🇪';
    if ($code == 'KG') return '🇰🇬';
    if ($code == 'KH') return '🇰🇭';
    if ($code == 'KI') return '🇰🇮';
    if ($code == 'KM') return '🇰🇲';
    if ($code == 'KN') return '🇰🇳';
    if ($code == 'KP') return '🇰🇵';
    if ($code == 'KR') return '🇰🇷';
    if ($code == 'KW') return '🇰🇼';
    if ($code == 'KY') return '🇰🇾';
    if ($code == 'KZ') return '🇰🇿';
    if ($code == 'LA') return '🇱🇦';
    if ($code == 'LB') return '🇱🇧';
    if ($code == 'LC') return '🇱🇨';
    if ($code == 'LI') return '🇱🇮';
    if ($code == 'LK') return '🇱🇰';
    if ($code == 'LR') return '🇱🇷';
    if ($code == 'LS') return '🇱🇸';
    if ($code == 'LT') return '🇱🇹';
    if ($code == 'LU') return '🇱🇺';
    if ($code == 'LV') return '🇱🇻';
    if ($code == 'LY') return '🇱🇾';
    if ($code == 'MA') return '🇲🇦';
    if ($code == 'MC') return '🇲🇨';
    if ($code == 'MD') return '🇲🇩';
    if ($code == 'ME') return '🇲🇪';
    if ($code == 'MF') return '🇲🇫';
    if ($code == 'MG') return '🇲🇬';
    if ($code == 'MH') return '🇲🇭';
    if ($code == 'MK') return '🇲🇰';
    if ($code == 'ML') return '🇲🇱';
    if ($code == 'MM') return '🇲🇲';
    if ($code == 'MN') return '🇲🇳';
    if ($code == 'MO') return '🇲🇴';
    if ($code == 'MP') return '🇲🇵';
    if ($code == 'MQ') return '🇲🇶';
    if ($code == 'MR') return '🇲🇷';
    if ($code == 'MS') return '🇲🇸';
    if ($code == 'MT') return '🇲🇹';
    if ($code == 'MU') return '🇲🇺';
    if ($code == 'MV') return '🇲🇻';
    if ($code == 'MW') return '🇲🇼';
    if ($code == 'MX') return '🇲🇽';
    if ($code == 'MY') return '🇲🇾';
    if ($code == 'MZ') return '🇲🇿';
    if ($code == 'NA') return '🇳🇦';
    if ($code == 'NC') return '🇳🇨';
    if ($code == 'NE') return '🇳🇪';
    if ($code == 'NF') return '🇳🇫';
    if ($code == 'NG') return '🇳🇬';
    if ($code == 'NI') return '🇳🇮';
    if ($code == 'NL') return '🇳🇱';
    if ($code == 'NO') return '🇳🇴';
    if ($code == 'NP') return '🇳🇵';
    if ($code == 'NR') return '🇳🇷';
    if ($code == 'NU') return '🇳🇺';
    if ($code == 'NZ') return '🇳🇿';
    if ($code == 'OM') return '🇴🇲';
    if ($code == 'PA') return '🇵🇦';
    if ($code == 'PE') return '🇵🇪';
    if ($code == 'PF') return '🇵🇫';
    if ($code == 'PG') return '🇵🇬';
    if ($code == 'PH') return '🇵🇭';
    if ($code == 'PK') return '🇵🇰';
    if ($code == 'PL') return '🇵🇱';
    if ($code == 'PM') return '🇵🇲';
    if ($code == 'PN') return '🇵🇳';
    if ($code == 'PR') return '🇵🇷';
    if ($code == 'PS') return '🇵🇸';
    if ($code == 'PT') return '🇵🇹';
    if ($code == 'PW') return '🇵🇼';
    if ($code == 'PY') return '🇵🇾';
    if ($code == 'QA') return '🇶🇦';
    if ($code == 'RE') return '🇷🇪';
    if ($code == 'RO') return '🇷🇴';
    if ($code == 'RS') return '🇷🇸';
    if ($code == 'RU') return '🇷🇺';
    if ($code == 'RW') return '🇷🇼';
    if ($code == 'SA') return '🇸🇦';
    if ($code == 'SB') return '🇸🇧';
    if ($code == 'SC') return '🇸🇨';
    if ($code == 'SD') return '🇸🇩';
    if ($code == 'SE') return '🇸🇪';
    if ($code == 'SG') return '🇸🇬';
    if ($code == 'SH') return '🇸🇭';
    if ($code == 'SI') return '🇸🇮';
    if ($code == 'SJ') return '🇸🇯';
    if ($code == 'SK') return '🇸🇰';
    if ($code == 'SL') return '🇸🇱';
    if ($code == 'SM') return '🇸🇲';
    if ($code == 'SN') return '🇸🇳';
    if ($code == 'SO') return '🇸🇴';
    if ($code == 'SR') return '🇸🇷';
    if ($code == 'SS') return '🇸🇸';
    if ($code == 'ST') return '🇸🇹';
    if ($code == 'SV') return '🇸🇻';
    if ($code == 'SX') return '🇸🇽';
    if ($code == 'SY') return '🇸🇾';
    if ($code == 'SZ') return '🇸🇿';
    if ($code == 'TC') return '🇹🇨';
    if ($code == 'TD') return '🇹🇩';
    if ($code == 'TF') return '🇹🇫';
    if ($code == 'TG') return '🇹🇬';
    if ($code == 'TH') return '🇹🇭';
    if ($code == 'TJ') return '🇹🇯';
    if ($code == 'TK') return '🇹🇰';
    if ($code == 'TL') return '🇹🇱';
    if ($code == 'TM') return '🇹🇲';
    if ($code == 'TN') return '🇹🇳';
    if ($code == 'TO') return '🇹🇴';
    if ($code == 'TR') return '🇹🇷';
    if ($code == 'TT') return '🇹🇹';
    if ($code == 'TV') return '🇹🇻';
    if ($code == 'TW') return '🇹🇼';
    if ($code == 'TZ') return '🇹🇿';
    if ($code == 'UA') return '🇺🇦';
    if ($code == 'UG') return '🇺🇬';
    if ($code == 'UM') return '🇺🇲';
    if ($code == 'US') return '🇺🇸';
    if ($code == 'UY') return '🇺🇾';
    if ($code == 'UZ') return '🇺🇿';
    if ($code == 'VA') return '🇻🇦';
    if ($code == 'VC') return '🇻🇨';
    if ($code == 'VE') return '🇻🇪';
    if ($code == 'VG') return '🇻🇬';
    if ($code == 'VI') return '🇻🇮';
    if ($code == 'VN') return '🇻🇳';
    if ($code == 'VU') return '🇻🇺';
    if ($code == 'WF') return '🇼🇫';
    if ($code == 'WS') return '🇼🇸';
    if ($code == 'XK') return '🇽🇰';
    if ($code == 'YE') return '🇾🇪';
    if ($code == 'YT') return '🇾🇹';
    if ($code == 'ZA') return '🇿🇦';
    if ($code == 'ZM') return '🇿🇲';
    return '🏳';
}

function time1($val)
{
    $endtime = microtime(true);
    $time = $endtime - $val;
    $time = substr($time, 0, 4);
    return $time;
}

// flush();
ob_flush();
