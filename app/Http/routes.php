<?php

Route::get('/', 'Pages@index');

Route::get('/about-us', 'Pages@aboutUs');

Route::get('/news', 'Pages@news');
Route::get('/news/{slug}', 'Pages@article');
Route::get('category/{slug}', 'Pages@category');

Route::get('/events-and-training', 'Events@index');
Route::get('/events', 'Events@events');
Route::get('/events/{slug}', 'Events@event');
Route::get('/past-events', 'Events@pastEvents');
Route::get('/training', 'Events@training');


Route::get('/become-a-member', 'Pages@becomeAMember');
Route::post('/become-a-member', 'Pages@postBecomeAMember');

Route::get('/contact-us', 'Pages@contactUs');
Route::post('/contact-us', 'Pages@postContactUs');

Route::group(['prefix' => 'member-area'], function() {
	Route::get('/', 'MemberArea@getIndex');
});

Route::get('/admin', 'Pages@admin');

$api = app('Dingo\Api\Routing\Router');
app('Dingo\Api\Transformer\Factory')->register('Article', '\HLS\Transformers\ArticleTransformer');


$api->version('v1', ['namespace' => 'HLS\Http\Controllers\Api'], function($api) {
    $api->post('authenticate', 'Authenticate@authenticate');
});

$api->version('v1', [
    'namespace' => 'HLS\Http\Controllers\Api',
    'middleware' => 'api.auth'
], function ($api) {
    $api->resource('articles', 'Articles', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    $api->resource('users', 'Users', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});


