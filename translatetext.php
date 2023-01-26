<?php

$langfile = 'lang/en.php';
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
