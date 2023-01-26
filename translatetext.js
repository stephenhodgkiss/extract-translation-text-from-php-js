function TranslateText(text) {
    if(langArray.text === undefined) {
        translatedText = text;
    } else {
        translatedText = langArray.text;
    }
    return translatedText;
}
