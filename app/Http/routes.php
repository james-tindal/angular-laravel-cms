<?php

Route::get('/', 'Pages@index');

Route::get('/about-us', 'Pages@aboutUs');

Route::get('/news', 'Pages@news');
Route::get('/news/{slug}', 'Pages@article');
Route::get('category/{name}', 'Pages@category');

Route::get('/events-and-training', 'Events@index');
Route::get('/events', 'Events@events');
Route::get('/events/{slug}', 'Events@event');
Route::get('/past-events', 'Events@pastEvents');
Route::get('/training', 'Events@training');
Route::get('/angular', function() {
    return view('pages.angular');
});

Route::get('/become-a-member', 'Pages@becomeAMember');
Route::post('/become-a-member', 'Pages@postBecomeAMember');

Route::get('/contact-us', 'Pages@contactUs');
Route::post('/contact-us', 'Pages@postContactUs');

Route::group(['prefix' => 'member-area'], function() {
	Route::get('/', 'MemberArea@getIndex');
});

Route::get('/admin', 'Pages@admin');

Route::group(['prefix' => 'api', 'namespace' => 'api'], function() {
    Route::resource('articles', 'Articles');
    Route::resource('enquiries', 'Enquiries');
    Route::resource('events', 'Events');
    Route::resource('requests', 'MemberRequests');
});



