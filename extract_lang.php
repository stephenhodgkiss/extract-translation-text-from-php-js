<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

$translateString = 'TranslateText';
$ignorePath1 = dirname(__FILE__).'/lang';
$filePath1 = 'lang/en.inc.php'; // PHP language array
$filePath2 = 'en_messages.txt'; // just the text part
$filePath3 = 'images_'.$filePath2; // just images

$matches = [];
$translateStringLength = strlen($translateString);

if ( fopen($filePath1, "w") !== false ) {

    // file opened successfully
    $file1 = fopen($filePath1, "w");

} else {
    echo "Failed to open or create a new file at ".$filePath1." - Check permissions and try again.";
    die();
}

if ( fopen($filePath2, "w") !== false ) {

    // file opened successfully
    $file2 = fopen($filePath2, "w");

} else {
    echo "Failed to open or create a new file at ".$filePath2." - Check permissions and try again.";
    die();
}

if ( fopen($filePath3, "w") !== false ) {

    // file opened successfully
    $file3 = fopen($filePath3, "w");

} else {
    echo "Failed to open or create a new file at ".$filePath3." - Check permissions and try again.";
    die();
}

$matchesIDX = count($matches);
$extractedCount = 0;

// call function for each file
processAllFiles(dirname(__FILE__));

fwrite($file1, '<?php' . PHP_EOL);

for ($IDX = 0; $IDX < count($matches); $IDX++) {
    if (isset($matches[$IDX]) && $matches[$IDX] != '' && $matches[$IDX] != '"') {

        $matchLowercase = strtolower($matches[$IDX]);
        $outputLine = "\$_lang['".$matches[$IDX]."'] = '".$matches[$IDX]."';";

        // if line ends with .jpg .jpeg .png .webp .gif .pdf then
        // ignore

        $matchLast4 = substr($matchLowercase,-4);
        $matchLast5 = substr($matchLowercase,-5);

        if ($matchLast4 == '.jpg' || $matchLast4 == '.png' || $matchLast4 == '.gif' || $matchLast4 == '.pdf' || $matchLast5 == '.jpeg' || $matchLast5 == '.webp') {
        } else {
            fwrite($file1, $outputLine . PHP_EOL);
            fwrite($file2, str_replace('<br>','\n',stripcslashes($matches[$IDX])) . PHP_EOL);
        }
    }
}

// run again just for images to force to the end of the array
for ($IDX = 0; $IDX < count($matches); $IDX++) {
    if (isset($matches[$IDX]) && $matches[$IDX] != '' && $matches[$IDX] != '"') {

        $matchLowercase = strtolower($matches[$IDX]);
        $outputLine = "\$_lang['".$matches[$IDX]."'] = '".$matches[$IDX]."';";

        // if line ends with .jpg .jpeg .png .webp .gif .pdf then
        // write to separate file

        $matchLast4 = substr($matchLowercase,-4);
        $matchLast5 = substr($matchLowercase,-5);

        if ($matchLast4 == '.jpg' || $matchLast4 == '.png' || $matchLast4 == '.gif' || $matchLast4 == '.pdf' || $matchLast5 == '.jpeg' || $matchLast5 == '.webp') {
            fwrite($file1, $outputLine . PHP_EOL);
            fwrite($file3, stripcslashes($matches[$IDX]) . PHP_EOL);
        }
    }
}

fwrite($file1, '?>' . PHP_EOL);

fclose($file1);
fclose($file2);
fclose($file3);

echo 'Done. '.$extractedCount.' translations extracted'.'<br>';
echo 'Translation Function: '.$translateString.'<br>';
echo 'PHP array file: '.$filePath1.'<br>';
echo 'Text only file: '.$filePath2.'<br>';
echo 'Image only file: '.$filePath3.'<br>';
exit;

function processAllFiles($dir) {

    global $ignorePath1;

    $files = scandir($dir);
    foreach($files as $file) {
        if(is_dir($dir.'/'.$file) && $file != '.' && $file != '..') {
            processAllFiles($dir.'/'.$file);
        } else {
            if(pathinfo($file, PATHINFO_EXTENSION) == 'js' || pathinfo($file, PATHINFO_EXTENSION) == 'php') {
                if ($dir != $ignorePath1) {
                    // echo $dir.'/'.$file . "<br>";
                    extractCalls($dir,$file);
                }
            }
        }
    }

}

function extractCalls ($dir,$filename) {

    global $matches,$translateString,$translateStringLength,$matchesIDX,$extractedCount;

    if (substr($filename,-3) == '.js') {
        $scriptDirectory = str_replace(dirname(__FILE__),'',$dir);
        $realFilename = 'https://'.$_SERVER['SERVER_NAME'].$scriptDirectory.'/'.$filename;
        $file_contents= file_get_contents($realFilename);
    } else {
        $realFilename = $dir.'/'.$filename;
        $file_contents = file_get_contents($realFilename);
    }

    $fileLength = strlen($file_contents);
    $IDX = 0;

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
            if (in_array($extractedCallText, $matches)) {
            } else {
                // echo "extractedCall1=".$strpos1." ".$endPos." ".$extractedCallText."<br><br>";
                $matches[$matchesIDX] = $extractedCallText;
                $extractedCount++;
                $matchesIDX++;
            }
            $IDX = $strpos1;
        } else if ($strpos2 > 0) {
            // double quote
            // find end of function call
            $endPos = strpos($file_contents,'")',$strpos2+$translateStringLength);
            $strpos2 = $strpos2+$translateStringLength+2;
            $extractedCallText = substr($file_contents,$strpos2,$endPos-$strpos2);
            if (in_array($extractedCallText, $matches)) {
            } else {
                // echo "extractedCall2=".$strpos2." ".$endPos." ".$extractedCallText."<br><br>";
                $matches[$matchesIDX] = $extractedCallText;
                $extractedCount++;
                $matchesIDX++;
            }
            $IDX = $strpos2;
        } else {
            $IDX = $fileLength;
        }

        $IDX++;
    }

}
