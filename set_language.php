<?php

$_lang = [];
$lang = 'EN';

if (isset($_GET['lang']) && $_GET['lang'] != '') {
    $time = time() - 3600 * 24 * 365 * 10;
    setcookie("lang", $_GET['lang'], ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);

    $time = time() + 3600 * 24 * 365 * 10;
    setcookie("lang", $_GET['lang'], ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);


    $lang = $_GET['lang'];
} elseif ($_COOKIE['lang'] != '') {
    $lang = $_COOKIE['lang'];
} else {
    $time = time() + 3600 * 24 * 365 * 10;
    setcookie("lang", 'EN', ['path' => '/', 'samesite' => 'Lax', 'secure' => true]);

    $lang = 'EN';
}

$ogLocale = "en_US";
if ($lang != 'EN') {
    $ogLocale = strtolower($lang) . '_' . strtoupper($lang);
}

$langfile = "lang/" . strtolower($lang) . ".inc.php";

if (!file_exists($langfile)) {
    $langfile = "lang/en.inc.php";
}

include($langfile);

// loop around the $lanffile and replace *## with <strong> and ##* with </strong>
foreach ($_lang as $key => $value) {
    $_lang[$key] = str_replace("*## ", "<strong>",  $value);
    $_lang[$key] = str_replace(" ##*", "</strong>", $_lang[$key]);
}
