<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Htpp\Controllers\Api_transactions;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('v1/transactions',[Transaksi::class,'save_transactions']);

/* Route::post('/v1/transactions',function(){
    return response()->json([
        'code'=>'20000',
        'message'=>'ok'
    ]);
});

$response = Http::withHeaders([
		'X-API-KEY' => 'DATAUTAMA',
		'X-SIGNATURE' => 'bar'
	])->post('http://example.com/users', [
    'quantity' => '',
    'product_id' => '',
]);
*/

//Route::post('/v1/transactions',[Api_controller::class,'index']);
Route::post('/v1/transactions', 'App\Http\Controllers\Api_transactions@savetransaksi');

