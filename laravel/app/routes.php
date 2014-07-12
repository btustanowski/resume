<?php
// Change blade tags for Angular compatibility.
Blade::setEscapedContentTags('[[[', ']]]');
Blade::setContentTags('[[', ']]');

Route::controller('admin', 'AdminController');
Route::controller('user', 'UserController');
Route::controller('education', 'EducationController');
Route::controller('experience', 'ExperienceController');

Route::get('/', 'HomeController@landing');
Route::get('/dash', 'HomeController@dash');