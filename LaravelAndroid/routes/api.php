<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('barang','apicontroller@read');
Route::post('barang/insert','apicontroller@insert');
Route::put('/barang/update/{kode_barang}', 'apicontroller@update');
Route::delete('/barang/delete/{kode_barang}', 'apicontroller@delete');