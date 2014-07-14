<?php
// Change blade tags for Angular compatibility.
Blade::setEscapedContentTags('[[[', ']]]');
Blade::setContentTags('[[', ']]');

Route::controller('admin', 'AdminController');
Route::controller('user', 'UserController');
Route::controller('education', 'EducationController');
Route::controller('experience', 'ExperienceController');
Route::controller('personal', 'PersonalController');
Route::controller('config', 'ConfigController');
Route::controller('interest', 'InterestController');
Route::controller('testimonial', 'TestimonialController');
Route::controller('skill', 'SkillController');
Route::controller('sample', 'SampleController');

Route::get('/', 'HomeController@landing');
