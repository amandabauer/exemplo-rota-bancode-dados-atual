<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
    return view('welcome');

});

Route::get('/marcondes', function () {
    $pessoas = DB::select('select * from pessoa');

    return view('cadastro.listagem', ['pessoas' => $pessoas]);
});

Route::get('/produtos',
    'App\Http\Controllers\ProdutoController@listagem');
Route::get('/produto/{id}',
    'App\Http\Controllers\ProdutoController@detalhe')
    ->where('id','[0-9]+');
Route::get('/produto_delete/{id}',
    'App\Http\Controllers\ProdutoController@delete')
    ->where('id','[0-9]+');
