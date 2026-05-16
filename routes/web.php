
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\PlatilloController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Perfil de usuario (común para ambos roles)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 2. Rutas para el Administrador / Staff del restaurante
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); 
})->name('admin.dashboard');

// NUEVAS RUTAS PARA TU CRUD (Agrégalas justo aquí abajo):
// Ruta especial para cambiar la disponibilidad (Boolean) con un botón rápido
Route::patch('/admin/platillos/{platillo}/toggle', [PlatilloController::class, 'toggleDisponibilidad'])
    ->name('admin.platillos.toggle');

// Rutas automáticas para Index, Create, Store, Edit, Update, Destroy
Route::resource('/admin/platillos', PlatilloController::class)
    ->names([
        'index'   => 'admin.platillos.index',
        'create'  => 'admin.platillos.create',
        'store'   => 'admin.platillos.store',
        'edit'    => 'admin.platillos.edit',
        'update'  => 'admin.platillos.update',
        'destroy' => 'admin.platillos.destroy',
    ])->except(['show']); // Excluimos 'show' porque no lo vamos a usar

    // 3. Ruta para el Cliente
    Route::get('/cliente/home', function () {
        return view('cliente.home');
    })->name('cliente.home');

    /**
     * NOTA: Mantenemos esta ruta 'dashboard' genérica por si algún componente 
     * de Breeze la busca, pero la lógica de redirección real ya la pusiste 
     * en AuthenticatedSessionController.
     */
    Route::get('/dashboard', function () {
    // Usamos la Facade Auth en lugar del helper auth()
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('cliente.home');
})->name('dashboard');
});

require __DIR__.'/auth.php';

