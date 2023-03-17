<?php

use App\Http\Controllers\ExpenseController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ExpenseController::class,'index'])->name('index');
Route::post('/expense', [ExpenseController::class, 'store'])->name('expense');   
Route::post('/importExpense', [ExpenseController::class, 'importExpense'])->name('import-expense');   
Route::put('/expense/edit/{expense}', [ExpenseController::class, 'update']);
Route::delete('/expense/delete/{expense}', [ExpenseController::class, 'destroy']);