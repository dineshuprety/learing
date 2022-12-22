<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
// route::get('/',StudentController::class);
Route::prefix('student')->middleware('auth')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
    Route::post('/update/{student}', [StudentController::class, 'update'])->name('update');
    Route::get('/delete/{student}', [StudentController::class, 'delete'])->name('delete');
});

//auth route
Route::get('/login', function(){
    return view('login');
})->name('login');

// validate the user
Route::post('/loging', function(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended(route('index'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

})->name('loging');


//logout
Route::get('/logout',function(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect(route('login'));
})->name('logout');

