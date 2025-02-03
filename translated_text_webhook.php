<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 'On');

// get the posted values
if (!isset($_POST['lang']) || !isset($_POST['messages'])) {
  echo "error: missing lang or messages";
  exit;
}

$baseDir = dirname(__FILE__);

// $messages = $_POST['messages'];
// // if the last character does not = ']' then add it
// if (substr($messages,-1) != ']') {
//     $messages .= ']';
// }

$lang = $_POST['lang'];
$messages = json_decode($_POST['messages'], true);

// if the $messages is not an array, return an error
if (!is_array($messages)) {
    echo "error: messages is not an array";
    exit();
}

// TESTING
// $messages = '[
//     "Fehler: Du hast die maximale Anzahl von Kampagnen erreicht.",
//     "Fehler beim Aktualisieren der Kampagnendaten",
//     "Kontaktieren Sie uns"
// ]';
// $messages = json_decode($messages, true);
// TESTING ENDS

// echo 'message 0: '.$messages[0].'<br>';
// echo 'count: '.count($messages).'<br>';
// echo 'message last: '.$messages[count($messages)-1].'<br>';
// die();

// write each message to the file
$file = $baseDir . '/' . $lang . '_messages.txt';

// delete the file first
if (file_exists($file)) {
  unlink($file);
}

// write each message to the file
foreach ($messages as $message) {
  file_put_contents($file, $message . "\n", FILE_APPEND | LOCK_EX);
}

echo 'ok';

?>