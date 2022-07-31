<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;

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

// HOME
Route::get('/', [PostController::class, 'index'])->name('home');
// Create for create new post and store it function to creating
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
// Show for show the post selected
Route::get('/post/show/{id}', [PostController::class, 'show'])->whereNumber('id')->name('post.show');
// Edit for modify the post and update it function to modify
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('edit.post');
Route::post('/post/update/{id}', [PostController::class, 'update'])->name('update.post');
// Delete 
Route::delete('/post/delete/{post}', [PostController::class, 'destroy'])->name('delete.post');
// Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
// Contact : Send email 
Route::post('/contact/send', [ContactController::class, 'sendContact'])->name('send.contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
