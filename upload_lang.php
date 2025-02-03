<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

// IMPORTANT: the order of both files below must be the same

// get the location of the directory this script is in
$baseDir = dirname(__FILE__);

$baseLangTemplate = 'lang/en.inc.php';
$langImages = 'images_en_messages.txt'; // just images
$langMessages = '%%LANG%%_messages.txt';
$translatedLang = 'lang/%%LANG%%.inc.php';

$lang = 'es';
if (isset($_REQUEST['lang'])) {
    $lang = strtolower($_REQUEST['lang']);
}

// replace %%LANG%% with language parameter if any
$langMessages = str_replace('%%LANG%%',$lang,$langMessages);
$translatedLang = str_replace('%%LANG%%',$lang,$translatedLang);

if (!file_exists($baseDir.'/'.$baseLangTemplate)) {
    echo 'Error: The base template file does not exist '.$baseDir.'/'.$baseLangTemplate;
    http_response_code(404);
    exit;
}if (!file_exists($baseDir.'/'.$langMessages)) {
    echo 'Error: The messages file does not exist '.$baseDir.'/'.$langMessages;
    http_response_code(404);
    exit;
}

$matches = [];
$file_contents = [];
$file_images = [];

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

// remove empty lines
for ($IDX = 0; $IDX < count($file_contents); $IDX++) {
    if (isset($file_contents[$IDX]) && $file_contents[$IDX] != '' && $file_contents[$IDX] != '"') {
    } else {
        unset($file_contents[$IDX]);
    }
}
echo count($file_contents).' message translations pre-loaded'.'<br><br>';

$file3 = fopen($langImages, "r");
if ($file3 && filesize($langImages) > 0) {
    $file_images = explode("\n", fread($file3, filesize($langImages)));
}

// remove empty lines
for ($IDX = 0; $IDX < count($file_images); $IDX++) {
    if (isset($file_images[$IDX]) && $file_images[$IDX] != '' && $file_images[$IDX] != '"') {
    } else {
        unset($file_images[$IDX]);
    }
}
echo count($file_images).' images pre-loaded'.'<br><br>';

if (count($matches) != count($file_contents)+count($file_images)) {
    die('Error: Count Mismatch');
}

$matchesIDX = count($matches);
$extractedCount = 0;

$file1 = fopen($translatedLang, "w");

fwrite($file1, '<?php' . PHP_EOL);

for ($IDX = 0; $IDX < count($matches)-count($file_images); $IDX++) {
    if (isset($matches[$IDX]) && $matches[$IDX] != '' && $matches[$IDX] != '"') {
        $line = preg_replace('/[\x0d]/', '', $file_contents[$IDX]);
        $outputLine = "\$_lang['".addslashes(stripcslashes($matches[$IDX]))."'] = '".addslashes(stripcslashes($line))."';";
        fwrite($file1, $outputLine . PHP_EOL);
    }
}

for ($IDX = count($matches)-count($file_images); $IDX < count($matches); $IDX++) {
    if (isset($matches[$IDX]) && $matches[$IDX] != '' && $matches[$IDX] != '"') {
        $outputLine = "\$_lang['".addslashes(stripcslashes($matches[$IDX]))."'] = '".addslashes(stripcslashes($matches[$IDX]))."';";
        fwrite($file1, $outputLine . PHP_EOL);
    }
}

fwrite($file1, '?>' . PHP_EOL);

fclose($file1);
fclose($file2);
fclose($file3);

echo 'Base language template: '.$baseLangTemplate.'<br>';
echo 'Input Messages File: '.$langMessages.'<br>';
echo 'New Messages File: '.$translatedLang.'<br>';
echo 'Done';
exit;
