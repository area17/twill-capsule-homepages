<?php

use Illuminate\Support\Facades\Route;

Route::module('homepages', [], ['except' => ['index']]);

Route::redirect('/homepages', '/homepage');

Route::name('homepages.landing')->get(
    '/homepage',
    '\\App\\Twill\\Capsules\\Homepages\\Http\\Controllers\\HomepageController@landing',
);
