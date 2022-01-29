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

Route::get('/admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('admin');
Route::get('/dentist/home', 'HomeController@dentistHome')->name('dentist.home')->middleware('dentist');

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
Route::post('/symptom/{condition}/store_rule_rel', 'SymptomController@store_rule_rel')->name('symptoms.store_rule_rel'); 
Route::get('/symptom/{condition}/manage_rule_rel', 'SymptomController@manage_rule_rel')->name('symptoms.manage_rule_rel');
Route::get('/symptom/edit_rule_rel/{condition}/{rule_rel}', 'SymptomController@edit_rule_rel')->name('symptoms.edit_rule_rel');
Route::post('/symptom/update_rule_rel/{rule_rel}/{condition}', 'SymptomController@update_rule_rel')->name('symptoms.update_rule_rel');
Route::post('/symptom/destroy_rule_rel/{condition}/{rule_rel}', 'SymptomController@destroy_rule_rel')->name('symptoms.destroy_rule_rel');

Route::get('/symptom/{condition}/create_cond_presc', 'Rule_relController@create_cond_presc')->name('rule_rels.create_cond_presc');
Route::post('/symptom/{condition}/store_cond_presc', 'Rule_relController@store_cond_presc')->name('rule_rels.store_cond_presc'); 
Route::get('/symptom/{condition}/manage_cond_presc', 'Rule_relController@manage_cond_presc')->name('rule_rels.manage_cond_presc');
Route::get('/symptom/edit_cond_presc/{condition}/{cond_presc}', 'Rule_relController@edit_cond_presc')->name('rule_rels.edit_cond_presc');
Route::post('/symptom/update_cond_presc/{cond_presc}/{condition}', 'Rule_relController@update_cond_presc')->name('rule_rels.update_cond_presc');
Route::post('/symptom/destroy_cond_presc/{condition}/{cond_presc}', 'Rule_relController@destroy_cond_presc')->name('rule_rels.destroy_cond_presc'); 

/**for workload */
Route::get('/workload/appointmentSetting', 'appointmentSettingController@index')->name('pages.workload.appointmentSetting');
Route::get('/workload/create_serv', 'appointmentSettingController@create_serv')->name('pages.workload.create_serv');
Route::post('/workload/store_serv', 'appointmentSettingController@store_serv')->name('pages.workload.store_serv'); 
Route::get('/workload/{AppointmentSetting}/edit_serv', 'appointmentSettingController@edit_serv')->name('pages.workload.edit_serv');
Route::put('/workload/{AppointmentSetting}/update_serv', 'appointmentSettingController@update_serv')->name('pages.workload.update_serv');
Route::post('/workload/destroy_serv/{AppointmentSetting}', 'appointmentSettingController@destroy_serv')->name('pages.workload.destroy_serv'); 

/** for update */
Route::get('/status/updatestatus/{id}', 'PendingController@edit')->name('updateStatus');
Route::post('/done', 'MeetingController@store');
Route::post('/done1', 'RecordController@store');
Route::post('/updated', 'PendingController@update'); 

/** for diagnosis - Dentist */
Route::get('/dentist/diagnosis', 'DiagnosisController@index')->name('diagnosis.index');
Route::get('/get_symptoms_list','DiagnosisController@sympList_json');
Route::get('/dentist/get_cond_suggest/{sel_symp}','DiagnosisController@cond_suggest');
Route::get('/get_conditions_list','DiagnosisController@condList_json');
Route::get('/dentist/get_presc_suggest/{sel_cond}','DiagnosisController@presc_suggest');
Route::get('/get_prescriptions_list','DiagnosisController@prescList_json');
Route::post('/dentist/diagnosis/store_diagnosis', 'DiagnosisController@store_diagnosis')->name('diagnosis.store_diagnosis'); 

Route::get('/dentist/statement', 'StatementController@index')->name('statement.index');
Route::post('/dentist/statement/store_statement', 'StatementController@store_statement')->name('statement.store_statement'); 








