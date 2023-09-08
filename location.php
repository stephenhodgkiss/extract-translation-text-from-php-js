<?php 

// Based on the IP address, this simple piece of text gets the 2 digit country code

$ip_address = $_SERVER['REMOTE_ADDR'];
$geo_data = json_decode(file_get_contents("http://ip-api.com/json/{$ip_address}"));
$country_code = $geo_data->countryCode; 

$languageCode = "en";

// using the country code, set a variable to the language code
if ($country_code == "US") {
    $languageCode = "en";
} else if ($country_code == "GB") {
    $languageCode = "en";
} else if ($country_code == "AU") {
    $languageCode = "en";
} else if ($country_code == "CA") {
    $languageCode = "en";
} else if ($country_code == "NZ") {
    $languageCode = "en";
} else if ($country_code == "IE") {
    $languageCode = "en";
} else if ($country_code == "ZA") {
    $languageCode = "en";
} else if ($country_code == "IN") {
    $languageCode = "en";
} else if ($country_code == "SG") {
    $languageCode = "en";
} else if ($country_code == "PH") {
    $languageCode = "en";
} else if ($country_code == "MY") {
    $languageCode = "en";
} else if ($country_code == "HK") {
    $languageCode = "en";
} else if ($country_code == "ID") {
    $languageCode = "en";
} else if ($country_code == "TH") {
    $languageCode = "en";
} else if ($country_code == "VN") {
    $languageCode = "en";
} else if ($country_code == "FR") {
    $languageCode = "fr";
} else if ($country_code == "BE") {
    $languageCode = "fr";
} else if ($country_code == "CH") {
    $languageCode = "fr";
} else if ($country_code == "LU") {
    $languageCode = "fr";
} else if ($country_code == "DE") {
    $languageCode = "de";
} else if ($country_code == "AT") {
    $languageCode = "de";
} else if ($country_code == "CH") {
    $languageCode = "de";
} else if ($country_code == "LU") {
    $languageCode = "de";
} else if ($country_code == "NL") {
    $languageCode = "nl";
} else if ($country_code == "BE") {
    $languageCode = "nl";
} else if ($country_code == "CH") {
    $languageCode = "nl";
} else if ($country_code == "LU") {
    $languageCode = "nl";
} else if ($country_code == "IT") {
    $languageCode = "it";
} else if ($country_code == "ES") {
    $languageCode = "es";
} else if ($country_code == "PT") {
    $languageCode = "pt";
} else if ($country_code == "BR") {
    $languageCode = "pt";
} else if ($country_code == "JP") {
    $languageCode = "ja";
} else if ($country_code == "CN") {
    $languageCode = "zh";
} else if ($country_code == "TW") {
    $languageCode = "zh";
} else if ($country_code == "KR") {
    $languageCode = "ko";
} else if ($country_code == "RU") {
    $languageCode = "ru";
} else if ($country_code == "TR") {
    $languageCode = "tr";
} else if ($country_code == "AR") {
    $languageCode = "es";
} else if ($country_code == "MX") {
    $languageCode = "es";
} else if ($country_code == "CO") {
    $languageCode = "es";
} else if ($country_code == "CL") {
    $languageCode = "es";
} else if ($country_code == "PE") {
    $languageCode = "es";
} else if ($country_code == "VE") {
    $languageCode = "es";
} else if ($country_code == "EC") {
    $languageCode = "es";
} else if ($country_code == "UY") {
    $languageCode = "es";
} else if ($country_code == "PY") {
    $languageCode = "es";
} else if ($country_code == "BO") {
    $languageCode = "es";
} else if ($country_code == "CR") {
    $languageCode = "es";
} else if ($country_code == "PA") {
    $languageCode = "es";
} else if ($country_code == "DO") {
    $languageCode = "es";
} else if ($country_code == "GT") {
    $languageCode = "es";
} else if ($country_code == "SV") {
    $languageCode = "es";
} else if ($country_code == "HN") {
    $languageCode = "es";
} else if ($country_code == "NI") {
    $languageCode = "es";
} else if ($country_code == "PR") {
    $languageCode = "es";
} else if ($country_code == "GR") {
    $languageCode = "el";
} else if ($country_code == "PL") {
    $languageCode = "pl";
} else if ($country_code == "CZ") {
    $languageCode = "cs";
} else if ($country_code == "HU") {
    $languageCode = "hu";
} else if ($country_code == "FI") {
    $languageCode = "fi";
} else if ($country_code == "SE") {
    $languageCode = "sv";
} else if ($country_code == "NO") {
    $languageCode = "no";
} else if ($country_code == "DK") {
    $languageCode = "da";
} else if ($country_code == "RO") {
    $languageCode = "ro";
} else if ($country_code == "BG") {
    $languageCode = "bg";
} else if ($country_code == "HR") {
    $languageCode = "hr";
} else if ($country_code == "RS") {
    $languageCode = "sr";
} else if ($country_code == "SK") {
    $languageCode = "sk";
} else if ($country_code == "SI") {
    $languageCode = "sl";
} else if ($country_code == "LT") {
    $languageCode = "lt";
} else if ($country_code == "LV") {
    $languageCode = "lv";
} else if ($country_code == "EE") {
    $languageCode = "et";
} else if ($country_code == "UA") {
    $languageCode = "uk";
} else if ($country_code == "BY") {
    $languageCode = "be";
} else if ($country_code == "MD") {
    $languageCode = "ro";
} else if ($country_code == "IL") {
    $languageCode = "he";
} else if ($country_code == "SA") {
    $languageCode = "ar";
} else if ($country_code == "AE") {
    $languageCode = "ar";
} else if ($country_code == "EG") {
    $languageCode = "ar";
} else if ($country_code == "MA") {
    $languageCode = "ar";
} else if ($country_code == "DZ") {
    $languageCode = "ar";
} else if ($country_code == "TN") {
    $languageCode = "ar";
} else if ($country_code == "LB") {
    $languageCode = "ar";
} else if ($country_code == "IQ") {
    $languageCode = "ar";
} else if ($country_code == "JO") {
    $languageCode = "ar";
} else if ($country_code == "KW") {
    $languageCode = "ar";
} else if ($country_code == "BH") {
    $languageCode = "ar";
} else if ($country_code == "OM") {
    $languageCode = "ar";
} else if ($country_code == "QA") {
    $languageCode = "ar";
} else if ($country_code == "YE") {
    $languageCode = "ar";
} else if ($country_code == "IR") {
    $languageCode = "fa";
} else if ($country_code == "AF") {
    $languageCode = "fa";
} else if ($country_code == "PK") {
    $languageCode = "ur";
} else if ($country_code == "IN") {
    $languageCode = "hi";
} else if ($country_code == "NP") {
    $languageCode = "ne";
} else if ($country_code == "LK") {
    $languageCode = "si";
} else if ($country_code == "BD") {
    $languageCode = "bn";
} else if ($country_code == "TH") {
    $languageCode = "th";
} else if ($country_code == "KH") {
    $languageCode = "km";
} else if ($country_code == "LA") {
    $languageCode = "lo";
} else if ($country_code == "MM") {
    $languageCode = "my";
} else if ($country_code == "PH") {
    $languageCode = "tl";
} else if ($country_code == "VN") {
    $languageCode = "vi";
} else if ($country_code == "ID") {
    $languageCode = "id";
} else if ($country_code == "MY") {
    $languageCode = "ms";
} else if ($country_code == "SG") {
    $languageCode = "ms";
} else if ($country_code == "BN") {
    $languageCode = "ms";
} else if ($country_code == "TW") {
    $languageCode = "zh";
} else if ($country_code == "CN") {
    $languageCode = "zh";
} else if ($country_code == "HK") {
    $languageCode = "zh";
} else if ($country_code == "MO") {
    $languageCode = "zh";
} else if ($country_code == "JP") {
    $languageCode = "ja";
} else if ($country_code == "KR") {
    $languageCode = "ko";
} else if ($country_code == "MN") {
    $languageCode = "mn";
} else if ($country_code == "KZ") {
    $languageCode = "kk";
} else if ($country_code == "UZ") {
    $languageCode = "uz";
} else if ($country_code == "TM") {
    $languageCode = "tk";
} else if ($country_code == "KG") {
    $languageCode = "ky";
} else if ($country_code == "TJ") {
    $languageCode = "tg";
} else if ($country_code == "AZ") {
    $languageCode = "az";
} else if ($country_code == "GE") {
    $languageCode = "ka";
} else if ($country_code == "AM") {
    $languageCode = "hy";
} else if ($country_code == "TR") {
    $languageCode = "tr";
} else if ($country_code == "CY") {
    $languageCode = "el";
} else if ($country_code == "MT") {
    $languageCode = "mt";
} else if ($country_code == "IS") {
    $languageCode = "is";
} else if ($country_code == "IE") {
    $languageCode = "ga";
} else if ($country_code == "AL") {
    $languageCode = "sq";
} else if ($country_code == "MK") {
    $languageCode = "mk";
} else if ($country_code == "BA") {
    $languageCode = "bs";
} else if ($country_code == "ME") {
    $languageCode = "sr";
} else if ($country_code == "RS") {
    $languageCode = "sr";
}

$languageCode = strtoupper($languageCode);

?>
