<?php

Route::get('chart-anchor-text', 'ChartController@anchorText')
    ->name('api.chart-anchor-text');

Route::get('chart-link-status', 'ChartController@linkStatus')
    ->name('api.chart-link-status');

Route::get('chart-from-url', 'ChartController@fromUrl')
    ->name('api.chart-from-url');

Route::get('chart-bldom', 'ChartController@bldom')
    ->name('api.chart-bldom');
