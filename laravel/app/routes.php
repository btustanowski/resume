<?php

Blade::setEscapedContentTags('[[[', ']]]');
Blade::setContentTags('[[', ']]');

Route::get('/', 'HomeController@landing');
Route::get('/dash', 'HomeController@dash');