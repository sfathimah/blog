



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

Route::get('/page', 'PageController@index')->name('pages.page');
Route::put('/page', 'PageController@update')->name('pages.update');
Route::get('/profiles', 'PageController@view_profile')->name('pages.viewprofile');
Route::get('/profiles/view/{id}', 'PageController@view_data_modal')->name('pages.view_profile');


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
Route::put('/workload/{AppointmentSetting}/update_newserv', 'appointmentSettingController@update_newserv')->name('pages.workload.update_newserv'); 

Route::put('/workload/{Threshold}/update_thres', 'appointmentSettingController@update_thres')->name('pages.workload.update_thres'); 

/** for update status*/
Route::get('/status/updatestatus/{id}', 'PendingController@edit')->name('updateStatus');
Route::post('/done', 'MeetingController@store');
Route::post('/done1', 'RecordController@store');
Route::post('/updated', 'PendingController@update'); 
Route::get('/status/pending', 'PendingController@index')->name('pending');

/**for schedule */

Route::get('/schedule', 'FullCalenderController@index')->name('pages.schedule.index');
Route::get('/schedule/{User}/fullcalender', 'FullCalenderController@fullcalender')->name('pages.schedule.fullcalender');
Route::post('/schedule/fullcalenderAjax/{User}','FullCalenderController@ajax');
Route::get('/schedule/{User}/edit', 'FullCalenderController@edit')->name('pages.schedule.edit');
Route::put('/schedule/{User}/update', 'FullCalenderController@update')->name('pages.schedule.update');
Route::post('/schedule/destroy/{User}', 'FullCalenderController@destroy')->name('pages.schedule.destroy'); 
Route::get('/schedule/create', 'FullCalenderController@create')->name('pages.schedule.create');
Route::post('/schedule/store', 'FullCalenderController@store')->name('pages.schedule.store'); 

/**for medical records */
Route::post('/pages/save/{id}', 'PageController@save')->name('pages.save'); 
Route::get('/pages/viewrecords/{id}', 'PageController@viewrecords')->name('pages.viewrecords');
Route::get('/pages/records/{id}', 'PageController@records')->name('pages.records');
Route::get('/pages/medicalrecord/index', 'MedicalRecordController@index')->name('pages.medicalrecord.index');
// Route::resource('/pages/medicalrecord/index','MedicalRecordController');
Route::get('/medicalrecord/{id}/edit/','MedicalRecordController@edit');
Route::post('/medicalrecord/store', 'MedicalRecordController@store')->name('pages.medicalrecord.store'); 
Route::post('/medicalrecord/destroy/{Patient}', 'MedicalRecordController@destroy')->name('pages.medicalrecord.destroy');

/**for booking meeting */

Route::get('/pages/meeting/index', 'MeetingController@index')->name('pages.meeting.index');
Route::post('/pages/meeting/search', 'MeetingController@search')->name('pages.meeting.search');
Route::get('/pages/meeting/cancel/{Bookedmeeting}', 'MeetingController@cancel')->name('pages.meeting.cancel');
Route::get('/pages/meeting/reject/{Bookedmeeting}', 'MeetingController@reject')->name('pages.meeting.reject');
Route::get('/pages/meeting/approve/{Bookedmeeting}', 'MeetingController@approve')->name('pages.meeting.approve');
Route::get('/pages/meeting/view/{id}', 'MeetingController@view')->name('pages.meeting.view');
Route::get('/pages/meeting/viewupdate/{id}', 'MeetingController@viewupdate')->name('pages.meeting.viewupdate');
//Route::post('/pages/meeting/meetingstatus', 'MeetingController@meetingstatus')->name('pages.meeting.meetingstatus');
Route::get('/pages/meeting/meetingstatus', 'MeetingController@meetingstatus')->name('pages.meeting.meetingstatus');
Route::get('/pages/meeting/updatestatus', 'MeetingController@updatestatus')->name('pages.meeting.updatestatus');
Route::post('/pages/meeting/book/{dentistid}/{date}/{slot}/{service}/{symptom}', 'MeetingController@book')->name('pages.meeting.book');

/** for diagnosis - Dentist */
Route::get('/dentist/diagnosis', 'DiagnosisController@index')->name('diagnosis.index');
Route::get('/dentist/diagnosis_int/{meetingid}/{patientid}', 'DiagnosisController@index_int')->name('diagnosis.index_int');
Route::get('/get_symptoms_list','DiagnosisController@sympList_json');
Route::get('/dentist/get_cond_suggest/{sel_symp}','DiagnosisController@cond_suggest');
Route::get('/get_conditions_list','DiagnosisController@condList_json');
Route::get('/dentist/get_presc_suggest/{sel_cond}','DiagnosisController@presc_suggest');
Route::get('/get_prescriptions_list','DiagnosisController@prescList_json');
Route::post('/dentist/diagnosis/store_diagnosis', 'DiagnosisController@store_diagnosis')->name('diagnosis.store_diagnosis'); 
Route::post('/dentist/diagnosis/store_diagnosis_int/{patientid}/{meetingid}', 'DiagnosisController@store_diagnosis_int')->name('diagnosis.store_diagnosis_int'); 

/** for statement - Dentist */
Route::get('/dentist/statement', 'StatementController@index')->name('statement.index');
Route::get('/dentist/statement_int/{meetingid}/{patientid}', 'StatementController@index_int')->name('statement.index_int');
Route::post('/dentist/statement/store_statement', 'StatementController@store_statement')->name('statement.store_statement'); 
Route::post('/dentist/statement/store_statement_int/{patientid}/{meetingid}', 'StatementController@store_statement_int')->name('statement.store_statement_int'); 
Route::get('/statement/history', 'StatementController@statement_history')->name('statement.history');
Route::get('/dentist/statement/history', 'StatementController@dentist_statement_history')->name('statement.dentist_history');
Route::get('/statement/view/{id}', 'StatementController@view_data_modal')->name('statement.view_data_modal');
