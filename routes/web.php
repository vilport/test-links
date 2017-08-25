<?php

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('importLinks', 'LinkImportController@import')
    ->name('importLinks');
