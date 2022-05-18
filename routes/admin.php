<?php

use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;

/* Ruta prinicipal de Dashboard */
Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

/* Rutas de Categorias */
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

/* Rutas de Etiquetas */
Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

/* Rutas de Post */
Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

/* Rutas de User */
Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');