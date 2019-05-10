<?php

Route::namespace('Axilweb\Contact\Http\Controllers')->group(function (){
    Route::get('/', 'ContactController@index');
    Route::get('/contact', 'ContactController@contact');
    Route::post('/contact', 'ContactController@send');
});


