<?php 

// Based on the IP address, this simple piece of code gets the 2 digit country code

$ip_address = $_SERVER['REMOTE_ADDR'];
$geo_data = json_decode(file_get_contents("http://ip-api.com/json/{$ip_address}"));
$country_code = $geo_data->countryCode; 
echo $country_code;
?>
