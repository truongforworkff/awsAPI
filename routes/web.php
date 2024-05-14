<?php

use Illuminate\Support\Facades\Route;

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


// routes/web.php

// Route::get('/get-product-info', 'AmazonController@getProductInfo');

use App\Http\Controllers\AmazonController;

Route::get('/products', [AmazonController::class, 'getProductInfo'])->name('products');

use App\Http\Controllers\ApiController;

Route::get('/fetch-data', [ApiController::class, 'fetchData']);