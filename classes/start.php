<?php
if (strpos($message, "/start") === 0 or strpos($message, "!start") === 0 or strpos($message, ".start") === 0) {
    $result = urlencode("
❆═══»ᴀꜱᴜʀ«═══❆
✮WELCOME,<a href='tg://user?id=$userId'>$firstname</a>
✮JOIN -» @ASURCCWORLD
✮JOIN -» @ASURCCWORLDCHAT
✮TYPE /register TO CONTINUE HERE✮
❆═══»ᴀꜱᴜʀ«═══❆
✮ᴏᴡɴᴇʀ -» @asur_sinchan
 
");
    reply_to($chatId, $result, $message_id);
}
