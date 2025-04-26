<?php

use App\Http\Controllers\HistorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get_his', [HistorialController::class,'index']);  //muestra todos los registros
Route::post('/search_his', [HistorialController::class,'show']);  //consultar por registro
Route::post('/post_his', [HistorialController::class,'store']);  //insertar registros
Route::put('/update_his', [HistorialController::class,'update']);  //actualizar registros
Route::delete('/delete_his', [HistorialController::class,'delete']);  //eliminar registro



