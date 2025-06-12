<?php
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

// Acesso pagina home (index)
Route::get('/', [homeController::class, 'index'])->name('home.index'); 
// Acesso a pagina de create de user
Route::get('/create-user', [homeController::class, 'create'])->name('user.create');
//  Back Create de user 
Route::post('/create-back-user', [homeController::class, 'create_back'])->name('user.create.post');
// Acesso a pagina de visualização de user
Route::get('/show-user/{user}', [homeController::class, 'show'])->name('user.show');
// Acesso a pagina de edição de user
Route::get('/edit-user/{user}', [homeController::class, 'edit'])->name('user.edit');
// Back Edit de user
Route::put('/update-back-user/{user}', [homeController::class, 'update_back'])->name('user.update.put');
// Back Delete de user
Route::delete('/delete-back-user/{user}', [homeController::class, 'delete_back'])->name('user.delete');