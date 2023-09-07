<?php

$_lang = [];

$langfile = 'lang/en.inc.php'; // you can start with an empty file until you have ran the extract script
include($langfile);

$jsonLang = json_encode($_lang);

// loop around the $lanffile and replace *## with <strong> and ##* with </strong>
foreach ($_lang as $key => $value) {
    $_lang[$key] = str_replace("*## ", "<strong>",  $value);
    $_lang[$key] = str_replace(" ##*", "</strong>", $_lang[$key]);
}

function TranslateText($text) {
    global $_lang;
    if (isset($_lang[$text])) {
        $translatedText = $_lang[$text];
    } else {
        $translatedText = $text;
    }
    return $translatedText;
}

?>
