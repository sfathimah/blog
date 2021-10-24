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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('products','ProductController');
Route::resource('symptoms','SymptomController');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/meeting', 'MeetingController@index')->name('meeting');
Route::get('/status/pending', 'PendingController@index')->name('pending');
Route::get('/record', 'RecordController@index')->name('records');

Route::get('/page', 'PageController@index')->name('pages.page');
Route::put('/page', 'PageController@update')->name('pages.update');

Route::get('/symptom', 'SymptomController@index')->name('symptoms.index');

Route::get('/symptom/create_cond', 'SymptomController@create_cond')->name('symptoms.create_cond');
Route::post('/symptom/store_cond', 'SymptomController@store_cond')->name('symptoms.store_cond');
Route::get('/symptom/{condition}/edit_cond', 'SymptomController@edit_cond')->name('symptoms.edit_cond');
Route::put('/symptom/{condition}/update_cond', 'SymptomController@update_cond')->name('symptoms.update_cond');
Route::post('/symptom/destroy_cond/{condition}', 'SymptomController@destroy_cond')->name('symptoms.destroy_cond'); 

Route::get('/symptom/create_presc', 'SymptomController@create_presc')->name('symptoms.create_presc');
Route::post('/symptom/store_presc', 'SymptomController@store_presc')->name('symptoms.store_presc');
Route::get('/symptom/{prescription}/edit_presc', 'SymptomController@edit_presc')->name('symptoms.edit_presc');
Route::put('/symptom/{prescription}/update_presc', 'SymptomController@update_presc')->name('symptoms.update_presc');
Route::post('/symptom/destroy_presc/{prescription}', 'SymptomController@destroy_presc')->name('symptoms.destroy_presc'); 

Route::get('/symptom/create_symp', 'SymptomController@create_symp')->name('symptoms.create_symp');
Route::post('/symptom/store_symp', 'SymptomController@store_symp')->name('symptoms.store_symp'); 
Route::get('/symptom/{symptom}/edit_symp', 'SymptomController@edit_symp')->name('symptoms.edit_symp');
Route::put('/symptom/{symptom}/update_symp', 'SymptomController@update_symp')->name('symptoms.update_symp');
Route::post('/symptom/destroy_symp/{symptom}', 'SymptomController@destroy_symp')->name('symptoms.destroy_symp'); 

Route::get('/symptom/{condition}/create_rule_rel', 'SymptomController@create_rule_rel')->name('symptoms.create_rule_rel');
Route::post('/symptom/store_rule_rel', 'SymptomController@store_rule_rel')->name('symptoms.store_rule_rel'); 
Route::get('/symptom/{condition}/manage_rule_rel', 'SymptomController@manage_rule_rel')->name('symptoms.manage_rule_rel');
Route::get('/symptom/{rule_rel}/edit_rule_rel', 'SymptomController@edit_rule_rel')->name('symptoms.edit_rule_rel');
Route::post('/symptom/{rule_rel}', 'SymptomController@update_rule_rel')->name('symptoms.update_rule_rel');
Route::post('/symptom/destroy_rule_rel/{rule_rel}', 'SymptomController@destroy_rule_rel')->name('symptoms.destroy_rule_rel'); 

/**for workload */
Route::get('/workload/appointmentSetting', 'appointmentSettingController@index')->name('pages.workload.appointmentSetting');
Route::get('/workload/create_serv', 'appointmentSettingController@create_serv')->name('pages.workload.create_serv');
Route::post('/workload/store_serv', 'appointmentSettingController@store_serv')->name('pages.workload.store_serv'); 
Route::get('/workload/{AppointmentSetting}/edit_serv', 'appointmentSettingController@edit_serv')->name('pages.workload.edit_serv');
Route::put('/workload/{AppointmentSetting}/update_serv', 'appointmentSettingController@update_serv')->name('pages.workload.update_serv');
Route::post('/workload/destroy_serv/{AppointmentSetting}', 'appointmentSettingController@destroy_serv')->name('pages.workload.destroy_serv'); 

/** for update */
Route::get('/status/updatestatus/{id}', 'PendingController@edit')->name('updateStatus');;
Route::post('/done', 'MeetingController@store');
Route::post('/done1', 'RecordController@store');
Route::post('/updated', 'PendingController@update'); 








