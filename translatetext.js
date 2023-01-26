const langArray = JSON.parse('<?=$jsonLang?>');

function TranslateText(textToTranslate) {
    if(langArray[textToTranslate] === undefined || langArray[textToTranslate] == '') {
        translatedText = textToTranslate;
    } else {
        translatedText = langArray[textToTranslate];
    }
    return translatedText;
}
