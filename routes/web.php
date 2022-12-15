<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
use App\Models\Classe;
use App\Models\Phone;
use App\Models\Student;
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
    $classes = Classe::all();
    $students = Student::all();
    $phones = Phone::all();
    return view('welcome', compact('classes', 'students', 'phones'));
});

Route::resource('student', StudentController::class);
Route::resource('classe', ClasseController::class);
Route::resource('phone', PhoneController::class);