<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

// Reads a whole TXT document and wraps each line with the function call 
// outputting the results in a new file

$translateString = 'TranslateText';
$filePath1 = 'input_document.txt'; // input file
$filePath2 = 'out_'.$filePath1; // output file

$matches = [];
$translateStringLength = strlen($translateString);

if ( fopen($filePath1, "r") !== false ) {

    // file opened successfully
    $file1 = fopen($filePath1, "r");

} else {
    echo "Failed to open file at ".$filePath1." - Check permissions and try again.";
    die();
}

if ( fopen($filePath2, "w") !== false ) {

    // file opened successfully
    $file2 = fopen($filePath2, "w");

} else {
    echo "Failed to open or create a new file at ".$filePath2." - Check permissions and try again.";
    die();
}

$file_contents = explode("\n", fread($file1, filesize($filePath1)));

for ($IDX = 0; $IDX < count($file_contents); $IDX++) {
    if (isset($file_contents[$IDX]) && $file_contents[$IDX] == '') {
    } else {
        $line = $file_contents[$IDX];
        $file_contents[$IDX] = $translateString."('".addslashes(stripcslashes($line))."')";
    }
}
echo count($file_contents).' Document Lines Read'.'<br><br>';

for ($IDX = 0; $IDX < count($file_contents); $IDX++) {
    fwrite($file2, $file_contents[$IDX] . PHP_EOL);
}

fclose($file1);
fclose($file2);

echo count($file_contents).' Document Lines Read'.'<br><br>';
echo 'Translation Function: '.$translateString.'<br>';
echo 'PHP array file: '.$filePath1.'<br>';
echo 'Text only file: '.$filePath2.'<br>';
exit;
