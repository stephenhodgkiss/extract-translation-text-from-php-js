<?php

$_lang = [];
$lang = '';
$html_lang = 'en_US';
$langCookieSet = false;

if (isset($_GET['lang']) && $_GET['lang'] != '') {
    // $time = time() + 3600 * 24 * 365 * 10;
    // setcookie("lang", $_GET['lang'], ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);
    $_SESSION['lang'] = $_GET['lang'];

    $langCookieSet = true;

    $lang = $_GET['lang'];
} elseif (isset($_SESSION['lang']) && $_SESSION['lang'] != '') {
    $langCookieSet = true;
    $lang = $_SESSION['lang'];
} else {
    if (isset($country_code) && $country_code != '') {
        $lang = $languageCode;
    }
}

$langfile = 'lang/' . strtolower($lang) . '.inc.php';

if (!file_exists($langfile)) {
    $langfile = 'lang/en.inc.php';
    $lang = 'EN';
}

$ogLocale = 'en_US';
if ($lang == 'CN') {
    $ogLocale = 'zh_CN';
} elseif ($lang != 'EN') {
    $ogLocale = strtolower($lang) . '_' . strtoupper($lang);
}

$html_lang = str_replace('_', '-', $ogLocale);

if (!$langCookieSet) {
    // $time = time() + 3600 * 24 * 365 * 10;
    // setcookie('lang', $lang, ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);
    $_SESSION['lang'] = $lang;
}

include($langfile);

// loop around the $lanffile and replace *## with <strong> and ##* with </strong>
foreach ($_lang as $key => $value) {
    $_lang[$key] = str_replace("*## ", "<strong>",  $value);
    $_lang[$key] = str_replace(" ##*", "</strong>", $_lang[$key]);
}

$jsonLang = json_encode($_lang);

function TranslateText($text)
{
    global $_lang;
    if (isset($_lang[$text])) {
        $translatedText = $_lang[$text];
        // ensure that any \" characters are replaced with &quot;
        $translatedText = str_replace('\"', '&quot;', $translatedText);
        $translatedText = str_replace("*##", "<strong>", $translatedText);
        $translatedText = str_replace("##*", "</strong>", $translatedText);
    } else {
        $translatedText = $text;
    }
    return $translatedText;
}
