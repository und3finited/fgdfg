<?php
if (strpos($message, "/cmds") === 0 or strpos($message, ".cmds") === 0 or strpos($message, ".cmds") === 0) {

    $result = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2 cmds«═══❆
✮/ccmds -»CC related cmds
✮/ucmds -»User cmds
✮/acmds -»Admin cmds
❆═══»ᴀꜱᴜʀ CHKV2 cmds«═══❆
");
    reply_to($chatId, $result, $message_id);
}



if (strpos($message, "/ccmds") === 0 or strpos($message, ".ccmds") === 0 or strpos($message, ".ccmds") === 0) {
    $result = urlencode("❆═══»ᴀꜱᴜʀ CHKV2 cmds«═══❆
✮/low -»Stripe charge 0.30$ 
✮/sax -»shopify charge 12$
✮/bin -»Bin check
✮/dsk -»sk chech
✮/cxt -»make cc extrape
✮/gen -»generate random cc
✮/ex  -»make bin extrap
❆═══»ᴀꜱᴜʀ CHKV2 cmds«═══❆
");
    reply_to($chatId, $result, $message_id);
}


if (strpos($message, "/ucmds") === 0 or strpos($message, ".ucmds") === 0 or strpos($message, ".ucmds") === 0) {

    $result = urlencode("
❆═══»ᴀꜱᴜʀ CHKV2 cmds«═══❆
✮/id -»Check id
✮/info -»check info
✮/credits -»Check your balance
❆═══»ᴀꜱᴜʀ CHKV2 cmds«═══❆");
    reply_to($chatId, $result, $message_id);
}


if (strpos($message, "/acmds") === 0 or strpos($message, ".acmds") === 0 or strpos($message, ".acmds") === 0) {

    $result = urlencode("");
    reply_to($chatId, $result, $message_id);
}




