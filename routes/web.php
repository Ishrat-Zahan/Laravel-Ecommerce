<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchesController;
use App\Http\Controllers\ShortBannerController;
use App\Http\Controllers\SubsubcategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Website\ProductController as WebsiteProductController;

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



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//............. admin route............

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/getsubcat/{id}', [SubcategoryController::class, 'getSubcat']);
Route::get("/getsubsubcat/{id}",[SubsubcategoryController::class, 'getSubsubcat']);
Route::post('/del_img', [ProductController::class, 'delete_img']);


Route::resources([
    'category' => CategoryController::class,
    'subcategory' => SubcategoryController::class,
    'subsubcategory' => SubsubcategoryController::class,
    'product' => ProductController::class,
    'shortbanner' => ShortBannerController::class,
    'brand' => BrandController::class,
    'order' => OrderController::class,
    'supplier' => SupplierController::class,
    'purches' => PurchesController::class,
]);
//............. website route...........


Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/homesubcat/{id}', [HomeController::class,'homesubcat']);
Route::get('/details/{id}', [HomeController::class, 'details'])->name('details');
Route::get('/cart/{id}', [HomeController::class,'cart']);
Route::get('/searchbox', [PurchesController::class, 'searchr']);



 
require __DIR__.'/auth.php';
