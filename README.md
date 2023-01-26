# extract-translation-text-from-php-js
Extract strings for translations from PHP and JS files

I was recently developing a few sites that needed to be in multiple languages. Searching online I found things such as using PO files and the POedit application, however they fell short of extracting the text that I could easily add to a PHP and JS script as an array. This applied to both the original language (English in my case) and any translated files.

The translation part is done manually using google translate or https://www.deepl.com/translator. This could be automated with an API from both those or even the new ChatGPT that's taking the tech world by storm.

I have also included an example of the functions I used in both PHP and JS.

1. The process

To make the development process easier, whenever a piece of text would need an associated translated version, wrap the text in function call.

a. PHP examples

<button onclick="SelectPackage('2'); return false;" type="button" class="btn btn-primary" style="width:100%; margin-top:15px; color:#000; font-weight:bold; font-size:1.5rem;"><?=TranslateText('Order Now')?></button>

and if you have images with text in different languages, use this simple trick ...

<img src="images/<?=TranslateText('d5i1')?>" class="img img-responsive" style="width:80%;">

In English, the value for 'd5i1' would be something like 'banner_EN.png' and 
in say Spanish would be something like 'banner_ES.png'

Add both the PHP and JS function calls to your scripts wherever they're needed.
