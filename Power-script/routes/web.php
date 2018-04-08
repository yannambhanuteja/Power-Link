<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Index page
Route::get('/', function () {
    return view('welcome');
});
//
Route::get('/faqs','FaqController@show');
//Contact Form
Route::get('/contact','ContactController@showContact');
Route::POST('/contact','ContactController@submitContact');

//Reviews
Route::get('/users/review/create/write', 'ReviewsController@create');
Route::POST('/users/review/create/write', 'ReviewsController@store')->name('review.store');

//payment proofs
Route::get('paymentproofs', 'HomeController@paymentProofs')->name('paymentproofs');
//Authentication Routes
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::group(['middleware' => ['verifyemail']], function () {
    Route::get('register', [
        'as' => 'register',
        'uses' => 'Auth\RegisterController@showRegistrationForm'
    ]);
});
//Register through referal

Route::get('/register/ref/{id}', 'HomeController@registerRef');
Route::POST('/register/ref/{id}', 'HomeController@registerRefSave');

Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);
//Email verfication
Route::post('verify/register', [
    'as' => 'register.verify',
    'uses' => 'HomeController@register'
]);


//Only for LoggedIn users
Route::group(['middleware' => ['LoggedIn']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/withdraw/{id}', 'UserController@withdraw');
    Route::get('/Mypayments/{id}', 'UserController@myPayments')->name('myPayments');
    Route::get('/Mysettings/{id}', 'UserController@mySettings')->name('mySettings');
    Route::get('/managelinks/{id}', 'UserController@manageLinks')->name('manageLinks');
    Route::delete('/managelinks/{id}', 'UserController@deleteLink')->name('delete.Link');

    Route::POST('/Mysettings/{id}', 'UserController@mySettingsSave');
    
});


Route::POST('/link', 'LinkController@store');

Route::group(['middleware' => ['captcha']], function () {
    Route::get('/{link}', 'LinkController@show');
});

Route::get('/ip/ip', 'LinkController@ip');

Route::get('/rates/payout', 'HomeController@payoutRates');

Route::POST('/link/recaptcha', 'LinkController@captcha');


//Admin Area
Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/dashboard', 'AdminController@index');

    Route::get('/admin/contact','ContactController@allContacts');

    Route::delete('/contact/{id}','ContactController@deleteContact')->name('contact.delete');
    
     Route::get('/admin/admins','AdminController@allAdmins');

    Route::delete('/admin/{id}','AdminController@deleteAdmin')->name('admin.delete');

    Route::resource('/admin/payoutrates', 'PayoutRates');

    Route::resource('/admin/reviews', 'ReviewsController');

    Route::resource('/admin/settings', 'SettingsController');

    Route::resource('/admin/ads', 'AdsController');

    Route::resource('/admin/terms', 'TermsController');

    Route::resource('/admin/faq', 'FaqController');

    Route::get('/admin/payout/request', 'PayoutController@show');

    Route::get('/admin/payout/history', 'PayoutController@history');

    Route::get('/{id}/{email}/{amount}', 'HomeController@makePayment')->name('makePayment');

    Route::get('/admin/dashboard/payment_made/{id}', 'HomeController@paymentMade');
    Route::get('/admin/users/list/show', 'AdminController@allUsersList');
    Route::get('/admin/links', 'AdminController@allLinks');
});

/* Conform email and save user */
Route::get('/conform/email/verify/{email}/{verifytoken}', 'HomeController@conformUser')->name('sendEmail');

/* admin registration routes */

Route::get('/admin/register', 'HomeController@addAdmin');
Route::POST('/admin/register', 'HomeController@saveAdmin')->name('save.Admin');

/*Single Link analysis  */

Route::get('/{id}/analysis', 'HomeController@singleAnalysis');
