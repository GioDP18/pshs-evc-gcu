<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocxToPdfConversionController;
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
Route::get('/convert-docx-to-pdf', [DocxToPdfConversionController::class, 'convert']);

Route::get('/guidance-call-slip', function () {
    return view('templates.guidance_call_slip');
});
Route::get('/comulative-records-form', function () {
    return view('templates.comulative_records_form');
});

Route::get('/{path}', function () {
    return view('welcome');
})->where('path', '.*');
