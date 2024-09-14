<?php

// Based on the IP address, this simple piece of text gets the 2 digit country code

$ip_address = $_SERVER['HTTP_X_REAL_IP'];
$geo_data = json_decode(file_get_contents("http://ip-api.com/json/{$ip_address}"));
// if call to ip-api.com fails, use "US" as default country code
if (!isset($geo_data) || $geo_data == "" || $geo_data == null || $geo_data == "undefined") {
    $country_code = "US";
} else {
    $country_code = $geo_data->countryCode;
}

$languageCode = "";

// using the country code, set the variable $languageCode for all french speaking countries
if ($country_code == "FR" || $country_code == "BE" || $country_code == "CA" || $country_code == "CH" || $country_code == "LU") {
    $languageCode = "fr";
}
// using the country code, set the variable $languageCode for all german speaking countries
if ($country_code == "DE" || $country_code == "AT" || $country_code == "CH") {
    $languageCode = "de";
}
// using the country code, set the variable $languageCode for all spanish speaking countries
if ($country_code == "ES" || $country_code == "AR" || $country_code == "BO" || $country_code == "CL" || $country_code == "CO" || $country_code == "CR" || $country_code == "CU" || $country_code == "DO" || $country_code == "EC" || $country_code == "GT" || $country_code == "HN" || $country_code == "MX" || $country_code == "NI" || $country_code == "PA" || $country_code == "PE" || $country_code == "PR" || $country_code == "PY" || $country_code == "SV" || $country_code == "UY" || $country_code == "VE") {
    $languageCode = "es";
}
// using the country code, set the variable $languageCode for all italian speaking countries
if ($country_code == "IT") {
    $languageCode = "it";
}
// using the country code, set the variable $languageCode for all portuguese speaking countries
if ($country_code == "PT" || $country_code == "BR") {
    $languageCode = "pt";
}
// using the country code, set the variable $languageCode for all dutch speaking countries
if ($country_code == "NL") {
    $languageCode = "nl";
}
// using the country code, set the variable $languageCode for all russian speaking countries
if ($country_code == "RU" || $country_code == "BY" || $country_code == "KZ" || $country_code == "KG" || $country_code == "TJ" || $country_code == "UA" || $country_code == "UZ") {
    $languageCode = "ru";
}
// using the country code, set the variable $languageCode for all polish speaking countries
if ($country_code == "PL") {
    $languageCode = "pl";
}
// using the country code, set the variable $languageCode for all chinese speaking countries
if ($country_code == "CN") {
    $languageCode = "cn";
}
// using the country code, set the variable $languageCode for all indonesian speaking countries
if ($country_code == "ID") {
    $languageCode = "id";
}
// using the country code, set the variable $languageCode for all arabic speaking countries
if ($country_code == "SA" || $country_code == "AE" || $country_code == "BH" || $country_code == "DZ" || $country_code == "EG" || $country_code == "IQ" || $country_code == "JO" || $country_code == "KW" || $country_code == "LB" || $country_code == "LY" || $country_code == "MA" || $country_code == "OM" || $country_code == "PS" || $country_code == "QA" || $country_code == "SD" || $country_code == "SY" || $country_code == "TN" || $country_code == "YE") {
    $languageCode = "ar";
}
// using the country code, set the variable $languageCode for all hindi speaking countries
if ($country_code == "IN") {
    $languageCode = "hi";
}
// using the country code, set the variable $languageCode for all bengali speaking countries
if ($country_code == "BD") {
    $languageCode = "bn";
}
// using the country code, set the variable $languageCode for all urdu speaking countries
if ($country_code == "PK") {
    $languageCode = "ur";
}


// if the country code is not in the list above, set the variable $languageCode to the lowercase version of the country code
if ($languageCode == "") {
    $languageCode = strtolower($country_code);
}

$languageCode = strtoupper($languageCode);
