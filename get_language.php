<?php

function getLanguage($code) {
  switch ($code) {
    case 'MS':
      return 'العربية الفصحى';
    case 'AL':
      return 'Shqip';
    case 'AD':
      return 'Català';
    case 'AT':
      return 'Deutsch';
    case 'BY':
      return 'Беларуская мова';
    case 'BE':
      return 'Nederlands';
    case 'BA':
      return 'Bosanski jezik';
    case 'BG':
      return 'Български';
    case 'GB':
      return 'English';
    case 'EN':
      return 'English';
    case 'HR':
      return 'Hrvatski';
    case 'CY':
      return 'Ελληνικά';
    case 'CZ':
      return 'Čeština';
    case 'DK':
      return 'Dansk';
    case 'EE':
      return 'Eesti keel';
    case 'FI':
      return 'Suomi';
    case 'FR':
      return 'Français';
    case 'DE':
      return 'Deutsch';
    case 'GR':
      return 'Ελληνικά';
    case 'HU':
      return 'Magyar';
    case 'IS':
      return 'Íslenska';
    case 'IE':
      return 'Gaeilge';
    case 'IT':
      return 'Italiano';
    case 'LV':
      return 'Latviešu valoda';
    case 'LI':
      return 'Deutsch';
    case 'LT':
      return 'Lietuvių kalba';
    case 'LU':
      return 'Lëtzebuergesch';
    case 'MT':
      return 'Malti';
    case 'MD':
      return 'Română';
    case 'MC':
      return 'Français';
    case 'ME':
      return 'Crnogorski jezik';
    case 'NL':
      return 'Nederlands';
    case 'MK':
      return 'Македонски јазик';
    case 'NO':
      return 'Norsk';
    case 'PL':
      return 'Polski';
    case 'PT':
      return 'Português';
    case 'RO':
      return 'Română';
    case 'RU':
      return 'Русский';
    case 'SM':
      return 'Italiano';
    case 'RS':
      return 'Српски';
    case 'SK':
      return 'Slovenčina';
    case 'SI':
      return 'Slovenščina';
    case 'ES':
      return 'Español';
    case 'SE':
      return 'Svenska';
    case 'CH':
      return 'Schwyzerdütsch';
    case 'UA':
      return 'Українська';
    case 'VA':
      return 'Italiano';
    case 'XK':
      return 'Shqip/Srpski';
    case 'TR':
      return 'Türkçe';
    default:
      return $code;
  }
}

?>