<?php

$word_app = new COM("Word.Application");
$word_app->Visible = true;

$word_app->Documents->Add();
var_dump($word_app->Selection);
$word_app->Selection->TypeText("<b>Jovan Popovic </b>\n  \n");
$word_app->Documents[1]->SaveAs("Author.docx");
