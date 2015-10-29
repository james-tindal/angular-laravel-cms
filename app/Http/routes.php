<?php

Route::get('/', 'Pages@getIndex');

Route::get('/about-us', 'Pages@getAboutUs');

Route::get('/news', 'Pages@getNews');

Route::get('/events-and-training', 'Pages@getEventsAndTraining');

Route::get('/become-a-member', 'Pages@getBecomeAMember');
Route::post('/become-a-member', 'Pages@postBecomeAMember');

Route::get('/contact-us', 'Pages@getContactUs');
Route::post('/contact-us', 'Pages@postContactUs');

Route::group(['prefix' => 'member-area'], function() {
	Route::get('/', 'MemberArea@getIndex');
});



