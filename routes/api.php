<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UtilisateurController;
use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\AdressController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\MagasinController;
use App\Http\Controllers\Api\V1\MagasinierController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\OrderItemsController;
use App\Http\Controllers\Api\V1\OtpCodeController;
use App\Http\Controllers\Api\V1\MethodController;
use App\Http\Controllers\Api\V1\PromoCodeController;
use App\Http\Controllers\Api\V1\ClientController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\ProductConfigurationController;
use App\Http\Controllers\Api\V1\ProductItemController;
use App\Http\Controllers\Api\V1\PromotionController;
use App\Http\Controllers\Api\V1\ReviewController;
use App\Http\Controllers\Api\V1\ShoppingCartItemController;
use App\Http\Controllers\Api\V1\PromotionProductItemController;
use App\Http\Controllers\Api\V1\StatusController;
use App\Http\Controllers\Api\V1\VariationController;
use App\Http\Controllers\Api\V1\VariationOptionController;
use App\Http\Controllers\Api\V1\ReportController;






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



Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){
    Route::apiResource('admins',AdminController::class);
    Route::apiResource('adresses',AdressController::class);
    Route::apiResource('carts',CartController::class);
    Route::apiResource('clients',ClientController::class);
    Route::apiResource('magasins',MagasinController::class);
    Route::apiResource('magasiniers',MagasinierController::class);
    Route::apiResource('methods',MethodController::class);
    Route::apiResource('orders',OrderController::class);
    Route::apiResource('orderitems',OrderItemsController::class);
    Route::apiResource('productconfigurations',ProductConfigurationController::class);
    Route::apiResource('products',ProductController::class);
    Route::apiResource('productitems',ProductItemController::class);
    Route::apiResource('promotions',PromotionController::class);
    Route::apiResource('promotionproductitems',PromotionProductItemController::class);
    Route::apiResource('reviews',ReviewController::class);
    Route::apiResource('shoppingcartitems',ShoppingCartItemController::class);
    Route::apiResource('statuses',StatusController::class);
    Route::apiResource('utilisateurs',UtilisateurController::class);
    Route::apiResource('variations',VariationController::class);
    Route::apiResource('variationoptions',VariationOptionController::class);
    Route::apiResource('reports',ReportController::class);
    Route::apiResource('promocodes',PromoCodeController::class);
    Route::apiResource('otpcodes',OtpCodeController::class);


});

    Route::post('registerationGoogle',[UtilisateurController::class,'registerationGoogle']);
    Route::post('verifyEmail',[UtilisateurController::class,'verifyEmail']);
    Route::post('Register',[UtilisateurController::class,'Register']);
    Route::post('Login',[UtilisateurController::class,'Login']);
    Route::post('Logout',[UtilisateurController::class,'Logout']);
    Route::post('AddToCart',[UtilisateurController::class,'AddToCart']);
    Route::post('DeleteProductFromCart',[UtilisateurController::class,'DeleteProductFromCart']);
    Route::get('countClient',[UtilisateurController::class,'countClient']);
    Route::get('countMagasinier',[UtilisateurController::class,'countMagasinier']);
    Route::get('countMagasin',[UtilisateurController::class,'countMagasin']);
    Route::post('deleteClient',[UtilisateurController::class,'deleteClient']);
    Route::post('deleteMagasinier',[UtilisateurController::class,'deleteMagasinier']);
    Route::post('registerationWithFacebook',[UtilisateurController::class,'RegisterationWithFacebook']);
    
