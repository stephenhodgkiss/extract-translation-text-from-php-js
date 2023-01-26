const langArray = JSON.parse(<?=jsonLang?>);

function TranslateText(text) {
    if(langArray[text] === undefined) {
        TranslateText = text;
    } else {
        translatedText = langArray[text];
    }
    return translatedText;
}
