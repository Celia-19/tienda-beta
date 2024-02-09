<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

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

Auth::routes();

//categoria
Route::resource('categoria', CategoriaController::class)
    ->except(['show'])
    ->middleware('auth');


    //eliminar logicamente categoria
    Route::get('/delete-categoria/{categoria_id}', array(
        'as' => 'categoriaDelete',
        'middleware' => 'auth',
        'uses' => '\App\Http\Controllers\CategoriaController@deleteCategoria'
     ));

     //Porducto////////////////////////////////
     Route::resource('producto', ProductoController::class)
     ->except(['show'])
     ->middleware('auth');
 
 
     //eliminar logicamente producto
     Route::get('/delete-producto/{producto_id}', array(
         'as' => 'productoDelete',
         'middleware' => 'auth',
         'uses' => '\App\Http\Controllers\ProductoController@deleteProducto'
      ));
     
 

// Route::get('/categoria', function () {
//     return view('categoria.index');
// });

// //Crear categoria
// Route::get('/categoria/create', [CategoriaController::class, 'create'])

//     ->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
