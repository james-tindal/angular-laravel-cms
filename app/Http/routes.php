<?php

Route::get('/', 'Pages@getIndex');

Route::get('/about-us', 'Pages@getAboutUs');

Route::get('/news', 'Pages@getNews');

Route::get('category/{category}', 'Pages@getCategory');

Route::get('/events-and-training', 'Events@index');

Route::get('/become-a-member', 'Pages@getBecomeAMember');
Route::post('/become-a-member', 'Pages@postBecomeAMember');

Route::get('/contact-us', 'Pages@getContactUs');
Route::post('/contact-us', 'Pages@postContactUs');

Route::group(['prefix' => 'member-area'], function() {
	Route::get('/', 'MemberArea@getIndex');
});

Route::get('/admin', 'Pages@getAdmin');

Route::group(['prefix' => 'api', 'namespace' => 'api'], function() {
    Route::resource('articles', 'Articles');
    Route::resource('enquiries', 'Enquiries');
    Route::resource('events', 'Events');
    Route::resource('requests', 'MemberRequests');
});



