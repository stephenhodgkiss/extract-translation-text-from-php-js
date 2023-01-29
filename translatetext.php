<?php

$langfile = 'lang/en.inc.php'; // you can start with an empty file until you have ran the extract script
include($langfile);

$jsonLang = json_encode($_lang);

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
