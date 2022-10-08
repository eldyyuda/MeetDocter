<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::resource('/',LandingController::class);
route::group(['middleware'=>['auth:sanctum','verified']],
function () {
    route::resource('appointment',AppointmentController::class);
    route::resource('payment',PaymentController::class);
}
);

route::group(['prefix'=>'frontsite','as'=>'frontsite.','middleware'=>['auth:sanctum','verified']],
function () {
    return view('dashboard');
}
);



