<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------
|| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::resource('photos', PagesController::class);
//Route::get('/user/{id}', [PagesController::class,'show']);

Route::post('/2',[PagesController::class,'fnRegistrarCurso'] )->name('Curso.xRegistrarCurso');

Route::get('/detalleCurso/{id}',[PagesController::class,'fnDetalleCurso'] )->name('Curso.xDetalleCurso');
Route::get('/listaCurso',[PagesController::class,'fnListaCurso'])->name('xListaCurso');

//update
Route::get('/actualizarCurso/{id}',[PagesController::class,'fnEstActualizarCurso']) ->name('Curso.xActualizarCurso');
Route::put('/actualizarCurso/{id}',[PagesController::class,'fnUpdateCurso'])->name('Curso.xUpdateCurso');
//delete
Route::delete('/eliminarCurso/{id}',[PagesController::class,'fnEliminarCurso'])->name('Curso.xEliminarCurso');

//////////////////ESTUDIANTE///////////////////////////////////////////////////////////////

Route::get('/',[PagesController::class,'fnIndex'] )->name('xIndex');
Route::post('/',[PagesController::class,'fnRegistrar'] )->name('Estudiante.xRegistrar');

Route::get('/detalle/{id}',[PagesController::class,'fnEstDetalle'] )->name('Estudiante.xDetalle');
Route::get('/lista',[PagesController::class,'fnLista'])->name('xLista');

//update
Route::get('/actualizar/{id}',[PagesController::class,'fnEstActualizar']) ->name('Estudiante.xActualizar');
Route::put('/actualizar/{id}',[PagesController::class,'fnUpdate'])->name('Estudiante.xUpdate');
//delete
Route::delete('/eliminar/{id}',[PagesController::class,'fnEliminar'])->name('Estudiante.xEliminar');

Route::get('/galeria/{numero?}', [PagesController::class,'fnGaleria']) -> where('numero','[0-9]+')->name('xGaleria');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
