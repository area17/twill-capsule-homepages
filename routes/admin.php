<?php

use Illuminate\Support\Facades\Route;

Route::module('homepages');

Route::name('homepages.landing')->get(
    '/homepage',
    '\\App\\Twill\\Capsules\\Homepages\\Http\\Controllers\\HomepageController@landing',
);
