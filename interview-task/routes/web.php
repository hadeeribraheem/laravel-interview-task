<?php

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\NotificationController;
use App\Http\Controllers\Web\TicketController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function () {
    // --------- start of login -----------------//
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login-post', [LoginController::class, 'save'])
        ->name('auth.login');
    // --------- end of login -------------------*/

});
// Routes that require the user to be logged in
Route::middleware(['checklogin'])->group(function () {
    //tickets
    Route::resources([
        'tickets' => TicketController::class,
    ]);
    Route::get('/notification',[NotificationController::class,'index'])->name('notifications');
    Route::post('/add-comment/{ticketId}',[CommentController::class,'store'])->name('comments.store');
    Route::get('/show-users',[UserController::class,'index'])->name('users');
    Route::get('/admin/users/export-pdf', [UserController::class, 'exportPDF'])->name('admin.users.export-pdf');
    Route::get('/delete', DeleteController::class)->name('delete');


});
