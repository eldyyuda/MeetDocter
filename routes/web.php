<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\RegisterController;

use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\HospitalPatientController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\ReportAppointmentController;
use App\Http\Controllers\Backsite\ReportTransactionController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\DoctorController;
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
    Route::resource('register_success', RegisterController::class);
}
);

route::group(['prefix'=>'backsite','as'=>'backsite.','middleware'=>['auth:sanctum','verified']],
function () {
    route::resource('dashboard',DashboardController::class);
    route::resource('role',RoleController::class);
    route::resource('config_payment',ConfigPaymentController::class);
    route::resource('consultation',ConsultationController::class);
    route::resource('hospital_patient',HospitalPatientController::class);
    route::resource('permission',PermissionController::class);
    route::resource('appointment',ReportAppointmentController::class);
    route::resource('transaction',ReportTransactionController::class);
    route::resource('specialist',SpecialistController::class);
    route::resource('type_user',TypeUserController::class);
    route::resource('user',UserController::class);
    Route::resource('doctor', DoctorController::class);
}
);



