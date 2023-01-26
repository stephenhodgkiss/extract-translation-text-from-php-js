<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

$translateString = 'TranslateText';
$filePath1 = 'lang/en.inc.php';
$filePath2 = 'en_messages.txt';
$append = false;

$_lang = [];
$translateStringLength = strlen($translateString);

// call function for each file
processAllFiles(dirname(__FILE__));

if ($append) {
    // TODO read existing file into array here
    include($filePath1);
}

$file1 = fopen($filePath1, "w"); // formatted PHP array
$file2 = fopen($filePath2, "w"); // just the text part

fwrite($file1, '<?php' . PHP_EOL);

for ($IDX = 0; $IDX < count($_lang); $IDX++) {
    if ($_lang[$IDX] != '' && $_lang[$IDX] != '"') {
        $outputLine = "\$_lang['".$_lang[$IDX]."'] = '".$_lang[$IDX]."';";
        fwrite($file1, $outputLine . PHP_EOL);
        fwrite($file2, $_lang[$IDX] . PHP_EOL);
    }
}

fwrite($file1, '?>' . PHP_EOL);

fclose($file1);
fclose($file2);

echo 'Done. '.count($_lang).' translations extracted'.'<br>';
echo 'Translation Function: '.$translateString.'<br>';
echo 'PHP array file: '.$filePath1.'<br>';
echo 'Text only file: '.$filePath2.'<br>';
exit;

function processAllFiles($dir) {
    $files = scandir($dir);
    foreach($files as $file) {
        if(is_dir($dir.'/'.$file) && $file != '.' && $file != '..') {
            processAllFiles($dir.'/'.$file);
        } else {
            if(pathinfo($file, PATHINFO_EXTENSION) == 'js' || pathinfo($file, PATHINFO_EXTENSION) == 'php') {
                // echo $dir.'/'.$file . "<br>";
                extractCalls($dir,$file);
            }
        }
    }
}

function extractCalls ($dir,$filename) {

    global $_lang,$translateString,$translateStringLength;

    if (substr($filename,-3) == '.js') {
        // echo 'filename='.$filename.'<br>';
        // echo '__FILE__='.dirname(__FILE__).'<br>';
        // echo '$dir='.$dir.'<br>';
        $scriptDirectory = str_replace(dirname(__FILE__),'',$dir);
        // echo '$scriptDirectory='.$scriptDirectory.'<br>';
        $realFilename = 'https://'.$_SERVER['SERVER_NAME'].$scriptDirectory.'/'.$filename;
        $file_contents= file_get_contents($realFilename);
    } else {
        $realFilename = $filename;
        $file_contents = file_get_contents($realFilename);
    }

    $fileLength = strlen($file_contents);
    $_langIDX = count($_lang);
    $IDX = 0;

    // echo 'extractCalls='.$realFilename.' length='.$fileLength.'<br>';

    while ($IDX < $fileLength) {

        $strpos1 = strpos($file_contents,$translateString."('",$IDX);
        $strpos2 = strpos($file_contents,$translateString.'("',$IDX);

        if ($strpos1 > 0 && $strpos1 < $strpos2) {
            $strpos2 = 0;
        } else if ($strpos2 > 0 && $strpos2 < $strpos1) {
            $strpos1 = 0;
        }

        if ($strpos1 > 0) {
            // single quote
            // find end of function call
            $endPos = strpos($file_contents,"')",$strpos1+$translateStringLength);
            $strpos1 = $strpos1+$translateStringLength+2;
            $extractedCallText = substr($file_contents,$strpos1,$endPos-$strpos1);
            // echo "extractedCall1=".$strpos1." ".$endPos." ".$extractedCallText."<br><br>";
            if (!in_array($extractedCallText, $_lang)) {
                $_lang[$_langIDX] = $extractedCallText;
                $_langIDX++;
            }
            $IDX = $strpos1;
        } else if ($strpos2 > 0) {
            // double quote
            // find end of function call
            $endPos = strpos($file_contents,'")',$strpos2+$translateStringLength);
            $strpos2 = $strpos2+$translateStringLength+2;
            $extractedCallText = substr($file_contents,$strpos2,$endPos-$strpos2);
            // echo "extractedCall2=".$strpos2." ".$endPos." ".$extractedCallText."<br><br>";
            if (!in_array($extractedCallText, $_lang)) {
                $_lang[$_langIDX] = $extractedCallText;
                $_langIDX++;
            }
            $IDX = $strpos2;
        } else {
            $IDX = $fileLength;
        }

        $IDX++;
    }

}
