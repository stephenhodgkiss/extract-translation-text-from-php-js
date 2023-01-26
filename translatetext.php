function TranslateText($text) {
    global $_lang;
    if (isset($_lang[$text])) {
        $translatedText = $_lang[$text];
    } else {
        $translatedText = $text;
    }
    return $translatedText;
}
