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

Route::get('/', function () {
    return view('welcome');
});

Route::post('captcha', 'CaptchaController@processToken');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('login/github', 'Auth\GitHubLoginController@redirectToGitHub')->name('github');
Route::get('login/github/authorized', 'Auth\GitHubLoginController@authorizedByGitHub');

Route::get('logout', 'Auth\LoginController@logout'); // ONLY FOR DEBUGGING
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register');

Route::get('account', function (){ return redirect(route('login')); });

Route::get('account/recovery', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('account/recovery/send', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('account/recovery/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('account/recovery', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('account/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('account/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('account/verify/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/home', 'HomeController@index')->name('home');

/*
Default Auth::routes();

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
$this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
$this->get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
$this->get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');