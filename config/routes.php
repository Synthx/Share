<?php

use App\Route;

/* MISC */
Route::get('/', 'Misc::showHome')->name('home');
Route::get('faq', 'Misc::showFaq')->name('faq');
Route::get('about-us', 'Misc::showAboutUs')->name('about');
Route::get('how-it-work', 'Misc::showHowItWork')->name('how-it-work');
Route::get('car-sharing-charter', 'Misc::showCharter')->name('charter');
Route::get('trust', 'Misc::showTrust')->name('trust');
Route::get('contact', 'Misc::showContact')->name('contact');
Route::post('contact', 'Misc::contact');

/* USER */
//Guest
Route::get('account/login', 'User::showLoginForm')->middleware('Guest')->name('user.login');
Route::post('account/login', 'User::login')->middleware('Guest');
Route::get('account/register', 'User::showRegisterForm')->middleware('Guest')->name('user.register');
Route::post('account/register', 'User::register')->middleware('Guest');
//Auth
Route::get('account/logout', 'User::logout')->middleware('Auth')->name('user.logout');
Route::get('dashboard', 'User::showDashboard')->middleware('Auth')->name('user.dashboard');
Route::get('dashboard/trips', 'User::showTrips')->middleware('Auth')->name('user.dashboard.trips');
Route::get('dashboard/reservations', 'User::showReservations')->middleware('Auth')->name('user.dashboard.reservations');
Route::get('dashboard/profile', 'User::showProfile')->middleware('Auth')->name('user.dashboard.profile');
Route::post('dashboard/profile', 'User::changeInformations')->middleware('Auth');

/* TRIP */
Route::get('trips', 'Trip::showSearch')->name('trip.search');
Route::get('trips/search', 'Trip::showList')->name('trip.list');
Route::get('trips/view', 'Trip::showDetail')->name('trip.view');
//Auth
Route::get('trips/add', 'Trip::showAddForm')->middleware('Auth')->name('trip.add');
Route::post('trips/add', 'Trip::AddTrip')->middleware('Auth');