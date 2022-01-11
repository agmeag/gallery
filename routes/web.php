<?php

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

Route::get("/", "GalleryController@galleryView");
Route::get("/photo_viewer", "GalleryController@galleryView");
Route::get("/gallery/get_files", "GalleryController@getFileList");
Route::post("/gallery/delete_file", "GalleryController@deleteFile");
Route::post("/gallery/move-file", "GalleryController@moveFile");
