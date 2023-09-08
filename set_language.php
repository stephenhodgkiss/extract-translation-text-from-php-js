<?php

$_lang = [];
$lang = '';
$langCookieSet = false;

if (isset($_GET['lang']) && $_GET['lang'] != '') {
    $time = time() - 3600 * 24 * 365 * 10;
    setcookie("lang", $_GET['lang'], ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);

    $time = time() + 3600 * 24 * 365 * 10;
    setcookie("lang", $_GET['lang'], ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);

    $langCookieSet = true;

    $lang = $_GET['lang'];
} elseif ($_COOKIE['lang'] != '') {
    $langCookieSet = true;
    $lang = $_COOKIE['lang'];
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
if ($lang != 'EN') {
    $ogLocale = strtolower($lang) . '_' . strtoupper($lang);
}

if (!$langCookieSet) {
    $time = time() + 3600 * 24 * 365 * 10;
    setcookie('lang', $lang, ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);
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
    } else {
        $translatedText = $text;
    }
    return $translatedText;
}
