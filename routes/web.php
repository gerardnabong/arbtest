<?php
use App\Jobs\SendEmailJob;  
use Carbon\Carbon;
use Predis\Client;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('roles','RolesController' );
Route::resource('categories','CategoriesController' );
Route::resource('expenses','ExpensesController' );
Route::resource('users','UsersController' );



Route::get('/','PagesController@dashboard' );
Route::get('/dashboard','PagesController@dashboard');

Route::get('/dashboard','PagesController@dashboard');

Route::resource('samplevues','SampleVueController' );

Route::get('/test','PagesController@decrypt');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('sendEmail', function(){

    $jobs = (new SendEmailJob())
        ->delay(Carbon::now()->addSeconds(10));

    dispatch($jobs);

    return 'Email Sent';

        

});