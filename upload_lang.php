<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// IMPORTANT: the order of both files below must be the same

$baseLangTemplate = 'lang/en.inc.php';
$langMessages = '%%LANG%%_messages.txt';
$translatedLang = 'lang/%%LANG%%.inc.php';

$lang = 'es';
if (isset($_REQUEST['lang'])) {
    $lang = strtolower($_REQUEST['lang']);
}

// replace %%LANG%% with language parameter if any
$langMessages = str_replace('%%LANG%%',$lang,$langMessages);
$translatedLang = str_replace('%%LANG%%',$lang,$translatedLang);

if (!file_exists(dirname(__FILE__).'/'.$baseLangTemplate)) {
    die('Error: The base template file does not exist '.dirname(__FILE__).'/'.$baseLangTemplate);
}if (!file_exists(dirname(__FILE__).'/'.$langMessages)) {
    die('Error: The messages file does not exist '.dirname(__FILE__).'/'.$langMessages);
}

$matches = [];

include($baseLangTemplate);
$IDX = 0;
foreach($_lang as $entry) {
    $matches[$IDX] = $entry;
    $IDX++;
}
echo count($matches).' base translations pre-loaded'.'<br>';

$file2 = fopen($langMessages, "r");
if ($file2) {
    $file_contents = explode("\n", fread($file2, filesize($langMessages)));
}
echo count($file_contents).' message translations pre-loaded'.'<br><br>';

if (count($matches) != count($file_contents)) {
    die('Error: Count Mismatch');
}

$matchesIDX = count($matches);
$extractedCount = 0;

$file1 = fopen($translatedLang, "w");

fwrite($file1, '<?php' . PHP_EOL);

for ($IDX = 0; $IDX < count($matches); $IDX++) {
    if (isset($matches[$IDX]) && $matches[$IDX] != '' && $matches[$IDX] != '"') {
        $outputLine = "\$_lang['".addslashes(stripcslashes($matches[$IDX]))."'] = '".addslashes(stripcslashes($file_contents[$IDX]))."';";
        fwrite($file1, $outputLine . PHP_EOL);
    }
}

fwrite($file1, '?>' . PHP_EOL);

fclose($file1);
fclose($file2);

echo 'Base language template: '.$baseLangTemplate.'<br>';
echo 'Input Messages File: '.$langMessages.'<br>';
echo 'New Messages File: '.$translatedLang.'<br>';
echo 'Done';
exit;
