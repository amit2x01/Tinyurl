<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinyUrlGenerator;
use App\Http\Controllers\Login;
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


Route::get('/ap/login', function () {
    return view('admin.login');
});
Route::post('/ap/login', [Login::class, 'login']);


Route::group(['middleware' => ['auth_admin']], function(){
    Route::get('/ap/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::post('/import/csv', [TinyUrlGenerator::class, 'import']);
    Route::post('/add/url', [TinyUrlGenerator::class, 'addNewUrl']);
    Route::get('/delete/url', [TinyUrlGenerator::class, 'DeleteUrl']);
    Route::get('/ap/logout', function(){
        if(Session::has('loggedId')){
            Session::forget('loggedId');
            return redirect('/ap/login');
        }
    }); 
    
    Route::get('/{shortUrl}', [TinyUrlGenerator::class, 'redirectUrl']);   
    

});

