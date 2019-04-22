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

Route::get('logout', 'Auth\LoginController@logout');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register');

Route::get('account', function (){ return redirect(route('login')); });

Route::get('account/recovery', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('account.recovery.request');
Route::post('account/recovery/send', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('account.recovery.email');
Route::get('account/recovery/{token}', 'Auth\ResetPasswordController@showResetForm')->name('account.recovery.reset');
Route::post('account/recovery', 'Auth\ResetPasswordController@reset')->name('account.recovery.update');

Route::get('account/email/verify', 'Auth\VerificationController@show')->name('account.email.verify.notice');
Route::get('account/email/verify/{id}', 'Auth\VerificationController@verify')->name('account.email.verify');
Route::get('account/email/verify/resend', 'Auth\VerificationController@resend')->name('account.email.verify.resend');

Route::get('dashboard', 'DashboardController@showOverview')->name('dashboard');

Route::get('dashboard/account', 'DashboardController@showAccount')->name('dashboard.account');

Route::get('telegram', function(){
    $response = \Telegram\Bot\Laravel\Facades\Telegram::getMe();

    $botId = $response->getId();
    $firstName = $response->getFirstName();
    $username = $response->getUsername();
    dd(compact('response', 'botId', 'firstName', 'username'));
});