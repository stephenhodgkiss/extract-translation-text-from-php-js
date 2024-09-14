const browserLanguage = "<?= $lang ?>";

const jsonLang = '<?= str_replace("'", "\'", $jsonLang) ?>';
var langArray = [];
if (jsonLang == null) {} else {
    langArray = JSON.parse(jsonLang);
}

function TranslateText(textToTranslate) {
    if (langArray === null || langArray[textToTranslate] === null || langArray[textToTranslate] === undefined || langArray[textToTranslate] == '') {
        translatedText = textToTranslate;
    } else {
        translatedText = langArray[textToTranslate];
    }

    return translatedText;
}
