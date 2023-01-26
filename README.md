# extract-translation-text-from-php-js
Extract strings for translations from PHP and JS files

I was recently developing a few sites that needed to be in multiple languages. Searching online I found things such as using PO files, php-gettext PHP library and the https://POedit.net application, however they fell short of extracting the text that I could easily add to a PHP and JS script as an array. This applied to both the original language (English in my case) and any translated files.

The translation part is done manually using google translate or https://www.deepl.com/translator. This could be automated with an API from both those or even the new ChatGPT that's taking the tech world by storm.

I have also included an example of the functions I used in both PHP and JS.

1. The process

To make the development process easier, whenever a piece of text needs an associated translated version, wrap the text in a function call.

This avoids having to think about translations and translation files until you are done with writing code using the base language first e.g. English

Add both the PHP and JS function calls to your scripts wherever they're needed.

a. PHP examples

````
```
<button onclick="SelectPackage('2'); return false;" type="button" class="btn btn-primary" style="width:100%; margin-top:15px; color:#000; font-weight:bold; font-size:1.5rem;"><?=TranslateText('Order Now')?></button>
```
````

and if you have images with text in different languages, use this simple trick ...

````
```
<img src="images/<?=TranslateText('d5i1')?>" class="img img-responsive" style="width:80%;">
```
````

In English, the value for 'd5i1' would be something like 'banner_EN.png' and 
in say Spanish would be something like 'banner_ES.png'

b. JS example

````
```
errorMsg = TranslateText('Select ONE item from the list above');
```
````

2. Extracting

Once you have all your translatable texts wrapped in a function call, the next stage is to run the extract_lang.php.

First, upload and amend the script changing lines 5-8 as necessary for your project. It should be in the root of your public folder, so it can read all files in that directory and all sub-directories.

After extracting the translations for the first time, the $append value should be changed to 'false' so it loads all current translations first.

Now open the script in your browser, once done it shows a summary of what it has produced: -

Done. 59 translations extracted 

Translation Function: TranslateText 

PHP array file: lang/en.inc.php 

Text only file: en_messages.txt 

You can use the Text only file as the source to use in the manual translations at google or deepl.

3. Notes regarding single and double quotes

The extraction process caters for you using single or double quotes in the function calls.

If your text contains a single quote, then you need to escape them in both PHP and JS instances, regardless if you wrap the text in single or double quotes.

Examples

````
```
const msg1 = TranslateText('That\'s a beautiful view');
const msg2 = TranslateText("Where\'s the appointment book?");
```
````
