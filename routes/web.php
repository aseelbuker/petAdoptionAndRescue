<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\rehomeController;
use App\Http\Controllers\adoptController;
use App\Http\Controllers\AdminAuthController;
use App\Models\Admin;



//Route::get('/login', [UserAuthController::class, 'userLogin'])->name('login');
//Route::post('/login', [UserAuthController::class, 'userCheckLogin'])->name('login.post');
//Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::get('/register', [authController::class, 'showRegister'])->name('register');
Route::get('/login', [authController::class, 'showLogin'])->name('login');


Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login']);


Route::post('/logout', [authController::class, 'logout'])->name('logout');






Route::prefix('admin')->group(function () {

    // GET /admin → login page
    Route::get('/', [AdminAuthController::class, 'showLoginForm'])
        ->name('admin.login');

    // POST /admin/login
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.submit');

    // POST /admin/logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    // 🔒 PROTECTED ADMIN ROUTES
    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', function () {
            $admins = Admin::all();
            return view('authAdmin.dashboard', compact('admins'));
        })->name('admin.dashboard');

    });

    

Route::resource('admins', AdminController::class)->names([
    'index' => 'admins.index',
    'create' => 'admins.create',
    'store' => 'admins.store',
    'show' => 'admins.show',
    'edit' => 'admins.edit',
    'update' => 'admins.update',
    'destroy' => 'admins.destroy'
]);

});



 

 Route::get('/', function () {
        return view('Home.index');
    })->name('home.index');

 Route::middleware('auth')->group(function () {


    Route::get('/report', function () {
        return view('Home.report');
    })->name('home.report');

    Route::get('/volunteer', [VolunteerController::class, 'index'])
        ->name('volunteer.index');

    Route::resource('reports', ReportController::class)->names([
        'create'=> 'reports.create',
        'store'=> 'reports.store',
        'show' => 'reports.show'
    ]);





Route::get('/adopt', [adoptController::class, 'index'])->name('adopt.index');
Route::get('/adopt/{id}', [adoptController::class, 'show'])->name('adopt.show');
// Show form



    
// Show form at /rehome (GET)
Route::get('/rehome', [rehomeController::class, 'create'])->name('rehome.create');

// Submit form (POST)
Route::post('/rehome', [rehomeController::class, 'store'])->name('rehome.store');

    
});


   