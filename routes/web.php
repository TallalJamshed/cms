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

Auth::routes();

Route::get('/register2',function(){
    return view('register2');
})->name('register2');
// Route::get('/',function(){
//     return view('index');
// });
Route::get('/', 'HomeController@index')->name('Home');
Route::get('/home', 'HomeController@index')->name('Home');
Route::get('/newcase', 'CaseController@addCaseForm')->name('Add New Case');
// Route::get('/newtask', 'CaseController@addCaseForm')->name('Add New Task');
Route::get('/allcases', 'CaseController@showAllCases')->name('All Cases');
Route::get('/today', 'CaseController@showTodayCases')->name('Today Cases');
Route::get('/next', 'CaseController@showNextCases')->name('Next Day Cases');
Route::get('/pending', 'CaseController@showPendingCases')->name('Pending Cases');
Route::get('/decided', 'CaseController@showDecidedCases')->name('Decided Cases');
Route::get('/edit/{id}', 'CaseController@showEditPage')->name('Edit Case');
/////////////////Perform Action///////////////
Route::post('/LgfFP1ax6D', 'CaseController@addCaseInDb')->name('addcaseindb');
Route::get('/V9uLoJsID4/{id}', 'CaseController@changeStatus')->name('changestatus');
Route::post('/khIJuhyQi3', 'CaseController@updateCaseData')->name('updatecase');
Route::post('/DWERDSFEEE', 'CaseController@deleteCase')->name('deletecase');



// Route::delete('/DWERDSFEEE/{client}', 'CaseController@deleteCase')->name('deletecase');



Route::get('/details/{id}','CaseController@showCaseDetails')->name('Case Details');

Route::get('/newtask' , 'TaskController@showTaskPage')->name('Add New Task');
Route::post('/saderesfef' , 'TaskController@addTaskInDb')->name('addtaskindb');
Route::get('/edittask/{id}' , 'TaskController@showEditTaskPage')->name('Edit Task');
Route::post('/deletetask', 'TaskController@deleteTask')->name('deletetask');
Route::get('/nexttask','TaskController@nextTasks')->name('Next Tasks');
Route::get('/prevtask','TaskController@previousTasks')->name('Previous Tasks');
Route::get('/jsandehfkj/{id}','TaskController@getDownload')->name('getdownload');
Route::post('/updatetask','TaskController@updateTaskData')->name('updatetask');

Route::get('/addclient' , 'ClientController@showClientForm')->name('Add Client');
Route::post('/dfafdfasas','ClientController@addClientInDb')->name('addclientindb');

Route::get('/casedetails/{id}','CaseController@getCaseDetails');
Route::get('/clientdetails/{id}','ClientController@getClientDetails');
Route::post('/deleteclient','ClientController@destroy')->name('deleteclient');

Route::post('/casefunctions','PayController@caseFunctions')->name('casefunctions');
Route::get('/casefunctionsget/{id}','PayController@payView')->name('casefunctionsget');


// Route::get('/sdthted/{id}','CaseController@sendMailToClient')->name('sendmailtoclient');

Route::get('/invoice','CaseController@showInvoice')->name('Invoice');
Route::post('/addpayment' , 'PayController@addPayment')->name('addpayment');

Route::post('/sendmail' , 'MailController@index')->name('sendmail');

Route::get('/showassociates','AssociatesController@create')->name('All Associates');
Route::post('/addassoc','AssociatesController@store')->name('addassocindb');
Route::post('/deleteassoc','AssociatesController@destroy')->name('deleteassoc');

Route::get('/addlegalnotice','HomeController@create')->name('Legal Notice');


// Route::get('/acronym','PayController@getAcronym');
// Route::get('dates/{id}', function ($id) {
//     $dates = DB::table('dates')->where('fk_case_id','=',$id)->orderby('prev_date','desc')->take(5)->pluck('prev_date')->toArray();
//     // dd($dates);
//     return $dates;
// });