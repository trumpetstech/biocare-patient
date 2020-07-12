<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

Auth::routes();


Route::post('/send-otp', 'PhoneAuthController@sendOTP')->name('auth.send-otp');
Route::post('/verify-otp', 'PhoneAuthController@verifyOTP')->name('auth.verify-otp');
Route::post('/resend-otp', 'PhoneAuthController@resendOTP')->name('auth.resend-otp');


Route::get('/members', 'MembersController@index')->name('members');
Route::post('/members', 'MembersController@store')->name('members');
Route::post('/members/choose', 'MembersController@choose')->name('members.choose');

Route::get('/members/add', 'MembersController@create')->name('members.create');


Route::middleware(['auth', 'member-selected'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/settings/members', 'SettingsController@members')->name('settings.members');
    Route::get('/profile', 'ProfileController@show')->name('profile');
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile', 'ProfileController@update')->name('profile');
    
    Route::get('/members/{member}/select', 'MembersController@select')->name('members.select');
    Route::get('/members/{member}/history', 'MembersController@history')->name('members.history');
    Route::post('/members/{member}/history', 'MembersController@storeHistory')->name('members.history');
    Route::get('/members/{member}/delete', 'MembersController@destroy')->name('members.delete');

    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::post('/reports', 'ReportsController@store')->name('reports');
    Route::get('/reports/{report}/delete', 'ReportsController@destroy')->name('reports.delete');
    Route::post('/reports/{report}/share', 'ReportsController@share')->name('reports.share');

    Route::get('/shared-videos', 'SharedVideosController@index')->name('shared-videos');

    Route::get('/appointments', 'DoctorAppointmentsController@index')->name('doctor-appointments');
    Route::get('/consultations', 'DoctorAppointmentsController@consulted')->name('consulted-doctors');

    Route::get('/lab-appointments', 'LabAppointmentsController@index')->name('lab-appointments');

    Route::get('/orders', 'PharmacyOrdersController@index')->name('pharmacy-orders');

    Route::get('/covid', 'CovidController@form')->name('covid.form');
    Route::post('/covid', 'CovidController@store')->name('covid.form');

    Route::post('/covid/vitals', 'CovidVitalsController@store')->name('covid.vitals');

    Route::get('/covid/{covid}/pay/{package}', 'CovidPaymentsController@pay')->name('covid.pay');
    Route::post('/covid/{covid}/payments/{package}/response', 'CovidPaymentsController@response')->name('covid.response');

    Route::get('/payments/consulting', 'PaymentsController@consulting')->name('payments.consulting');
    Route::get('/payments/pharmacy', 'PaymentsController@pharmacy')->name('payments.pharmacy');
    Route::get('/payments/lab', 'PaymentsController@lab')->name('payments.lab');

    Route::get('/doctors', 'DoctorsController@index')->name('doctors.index');
    Route::get('/doctors/{doctor}', 'DoctorsController@show')->name('doctors.show');

    Route::get('/doctors/{doctor}/appointments/{type}/{locationId}', 'DoctorAppointmentsController@showBookingForm')->name('doctors.book');
    Route::post('/doctors/{doctor}/appointments/{type}/{locationId}', 'DoctorAppointmentsController@book')->name('doctors.book');

    Route::get('/appointments/{appointment}', 'DoctorAppointmentsController@show')->name('doctors.appointments.show');
    Route::get('/appointments/{appointment}/chat', 'ChatController@index')->name('appointments.chat'); 
    Route::get('/appointments/{appointment}/call', 'DoctorAppointmentsController@call')->name('appointments.call'); 
    Route::get('/appointments/{appointment}/pay', 'DoctorPaymentController@pay')->name('doctors.appointments.pay');
    Route::post('/appointments/{appointment}/payments/response', 'DoctorPaymentController@response')->name('doctors.appointments.response');

    Route::get('/messages/{appointment}', 'ChatController@fetchMessages');
    Route::post('/messages/{appointment}', 'ChatController@sendMessage');

    Route::post('/doctors/{doctor}/feedback', 'DoctorFeedbackController@store')->name('doctors.feedback');

    Route::post('/labs/find', 'LabsController@index');
    Route::get('/labs/{lab}/book', 'LabsController@book');
    Route::post('/labs/{lab}/appointments/book', 'LabAppointmentsController@book');

    Route::post('/labs/{lab}/feedback', 'LabFeedbackController@store')->name('labs.feedback');

    Route::get('/pharmacies/find', 'PharmacyController@index');
    Route::get('/pharmacies/{pharmacy}/order', 'PharmacyController@book');
    Route::post('/pharmacies/{pharmacy}/orders', 'PharmacyOrdersController@book');
    Route::get('/orders/{order}', 'PharmacyOrdersController@show')->name('pharmacies.orders.show');
    
    Route::post('/pharmacies/{pharmacy}/feedback', 'PharmacyFeedbackController@store')->name('pharmacies.feedback');

    Route::get('/orders/{order}/pay', 'PharmacyPaymentController@pay')->name('pharmacies.orders.pay');
    Route::post('/orders/{order}/payments/response', 'PharmacyPaymentController@response')->name('pharmacies.orders.response');

    Route::get('/covid/chat', 'CovidChatController@index');
    Route::get('/covid-messages/{covid}', 'CovidChatController@fetchMessages');
    Route::post('/covid-messages/{covid}', 'CovidChatController@sendMessage');
}); 

