<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use Session;
use Illuminate\Http\Request;
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



Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:0'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});



  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:1'])->group(function () {

    Route::get('/locale/{locale}', function(Request $request, $locale){

        App::setLocale($locale);
        session()->put('locale', $locale);
        session()->put('my_locale', $locale);
        session()->save();
       
        $referer = Redirect::back()->getTargetUrl();
        $parse_url = parse_url($referer, PHP_URL_PATH);
        $segments = explode('/', $parse_url);
        if(in_array($request->segments(2), config('app.available_locale'))){
            App::setLocale($request->segments(2));
        }else{
            App::setLocale($request->segment(1));
        }
        // if (in_array($segments[1], App\Http\Middleware\Language::$languages)) {

        //     unset($segments[1]);
        // }
        // if ($lang != App\Http\Middleware\Language::$mainLanguage){
        //     array_splice($segments, 1, 0, $lang);
        // }
        
        $url = $request->root().implode("/", $segments);
        if(str_contains($referer, $locale)){
            $finalurl = $request->root().'/';
        }else{
            $finalurl = $request->root()."/{$locale}/";
        }
        // $finalurl = $request->root()."/{$locale}/";
        $totalseg = count($segments);
        $check_arr = ['', 'en', 'du'];
        foreach($segments as $ind => $val){

            if(!in_array($val, $check_arr)){
                if($ind == $totalseg - 1){
                    $finalurl .= $val;
                }else{
                    $finalurl .= $val.'/';
                }
                
            }
        }
       
        return redirect($finalurl);
})->name('locale');


    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
        Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
        Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

        Route::get('/calculator', ['as' => 'vehicle.calculator', function(){
            return view('cars.calculator');
        }]);
        Route::post('vehicle/searchplate', ['as' => 'vehicle.searchplate', 'uses' => 'App\Http\Controllers\VehicleController@searchplate']);
        Route::post('vehicle', ['as' => 'vehicle.store', 'uses' => 'App\Http\Controllers\VehicleController@store']);
        Route::get('vehicle', ['as' => 'vehicle.index', 'uses' => 'App\Http\Controllers\VehicleController@index']);
        Route::get('vehicle/show/{id}', ['as' => 'vehicle.show', 'uses' => 'App\Http\Controllers\VehicleController@show']);
        Route::get('vehicle/edit/{id}', ['as' => 'vehicle.edit', 'uses' => 'App\Http\Controllers\VehicleController@edit']);
        Route::patch('vehicle/update/{id}', ['as' => 'vehicle.update', 'uses' => 'App\Http\Controllers\VehicleController@update']);
        Route::get('vehicle/delete/{id}', ['as' => 'vehicle.delete', 'uses' => 'App\Http\Controllers\VehicleController@destroy']);
        Route::resource('vehicle', VehicleController::class);
        
    });
    
    Route::group(['middleware' => 'auth'], function () {
        Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
    });
    
});
Route::get('/home', 'App\Http\Controllers\HomeController@adminHome')->name('dashboard');
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:2'])->group(function () {
  
    Route::get('/seller/home', [HomeController::class, 'sellerHome'])->name('seller.home');
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');








// Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
// });

