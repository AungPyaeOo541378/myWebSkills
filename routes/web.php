<?php

use App\Http\Controllers\ImageCRUDController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TextCRUDController;
use App\Http\Controllers\ViewAllSourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

//view my work
Route::get('/viewMyWork', function () {
    return view('viewMyWork');
})->name('viewMyWork');

// for Text CRUD
Route::get('/forTextCRUD/textCRUD', [TextCRUDController::class, 'textCRUD'])->name('textCRUD');
Route::post('/forTextCRUD/textCRUD', [TextCRUDController::class, 'textStore'])->name('textStore');
Route::get('/forTextCRUD/textDetail/{id}', [TextCRUDController::class, 'textDetail'])->name('textDetail');
Route::get('/forTextCRUD/textDelete/{id}', [TextCRUDController::class, 'textDelete'])->name('textDelete');
Route::get('/forTextCRUD/textEditPage/{id}', [TextCRUDController::class, 'textEditPage'])->name('textEditPage');
Route::post('update', [TextCRUDController::class, 'update'])->name('update');

// for Image CRUD
Route::get('/forImgCRUD/imgCRUD', [ImageCRUDController::class, 'imgCRUD'])->name('imgCRUD');
Route::post('imgStore', [ImageCRUDController::class, 'imgStore'])->name('imgStore');
Route::get('imgDelete/{id}', [ImageCRUDController::class, 'imgDelete'])->name('imgDelete');
Route::get('imgDetail/{id}', [ImageCRUDController::class, 'imgDetail'])->name('imgDetail');
Route::get('imgEditPage/{id}', [ImageCRUDController::class, 'imgEditPage'])->name('imgEditPage');
Route::post('updateImg', [ImageCRUDController::class, 'updateImg'])->name('updateImg');



// search and filter
Route::get('searchAndFilter/search', [SearchController::class, 'search'])->name('search');
