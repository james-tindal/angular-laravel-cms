<?php

Route::get('/', 'Pages@getIndex');

Route::get('/about-us', 'Pages@getAboutUs');

Route::get('/news', 'Pages@getNews');

Route::get('/events-and-training', 'Pages@getEventsAndTraining');

Route::get('/become-a-member', 'Pages@getBecomeAMember');
Route::post('/become-a-member', 'Pages@postBecomeAMember');

Route::get('/contact-us', 'Enquire@create');
Route::post('/contact-us', 'Enquire@postContactUs');

Route::group(['prefix' => 'member-area'], function() {
	Route::get('/', 'MemberArea@getIndex');
});

Route::get('/admin', 'Pages@getAdmin');

Route::group(['prefix' => 'api', 'namespace' => 'api'], function() {
    Route::resource('articles', 'Articles');
});



