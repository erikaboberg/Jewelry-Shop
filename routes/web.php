<?php

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

Route::get('/',  ["uses"=>"ProductsController@index", "as"=> "allproducts"]);

Route::get('products', ["uses"=>"ProductsController@index"]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Sökfunktion
Route::get('search', ["uses"=>"ProductsController@search", "as"=> "searchProducts"]);

//## Kategorier ##//

//Halsband
Route::get('products/halsband', ["uses"=>"ProductsController@halsbandProducts", "as"=> "halsbandProducts"]); 
//Ringar
Route::get('products/ringar', ["uses"=>"ProductsController@ringarProducts", "as"=> "ringarProducts"]); 
//Armband
Route::get('products/armband', ["uses"=>"ProductsController@armbandProducts", "as"=> "armbandProducts"]); 
//Örhängen
Route::get('products/orhangen', ["uses"=>"ProductsController@orhangenProducts", "as"=> "orhangenProducts"]); 
// TODO övrigt !!!

//Kontaktsida
Route::get('/contact', ["uses"=>"ProductsController@contact", "as"=> "contact"]); 

//## Varukorg ##//

//Varukorg
Route::get('cart',["uses"=>"ProductsController@showCart", "as"=> "cartproducts"]);

// Lägg till produkt i varukorg
Route::get('product/addToCart/{id}',['uses'=>'ProductsController@addProductToCart', 'as'=> 'AddToCartProduct']); 

// Ta bort produkt från varukorg, skicka med id på produkten. 
Route::get('product/deleteItemFromCart/{id}',['uses'=>'ProductsController@deleteItemFromCart', 'as'=> 'DeleteItemFromCart']); 

// Ändra antal produkter, öka och minska antalet.

Route::get('product/increaseSingleProduct/{id}',['uses'=>'ProductsController@increaseSingleProduct', 'as'=> 'IncreaseSingleProduct']); 
Route::get('product/decreaseSingleProduct/{id}',['uses'=>'ProductsController@decreaseSingleProduct', 'as'=> 'DecreaseSingleProduct']); 


//create an order
Route::get('product/createOrder/',['uses'=>'ProductsController@createOrder','as'=>'createOrder']);

// Checkout sidan
// Route::get('product/checkoutProducts/',['uses'=>'ProductsController@checkoutProducts', 'as'=> 'checkoutproducts']); 


//## Admin Panel ##//

// Admin panelen, kommer endast åt den ifall man är satt som admin i databasen.

Route::get('admin/products', ["uses"=>"Admin\AdminProductsController@index", "as"=> "admin.displayProducts"])->middleware('restrictToAdmin'); 

// Ändra produkt

Route::get('admin/editProduct/{id}', ["uses"=>"Admin\AdminProductsController@editProduct", "as"=> "admin.EditProduct"]);

// Ändra bild

Route::get('admin/editProductImage/{id}', ["uses"=>"Admin\AdminProductsController@editProductImage", "as"=> "admin.EditProductImage"]);

// Uppdatera bilden med en post request där inte requesten syns i URL'n
// UpdateProductImage är funktionen som hantera och namn på URL'n

Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);

// Uppdatera produkt

Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

// Ta bort produkt

Route::get('admin/deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as"=> "admin.DeleteProduct"]);


// Skapa produkt admin panelen, finns inget id då ny produkt ska skapas.

Route::get('admin/createProduct', ["uses"=>"Admin\AdminProductsController@createProduct", "as"=> "adminCreateProduct"]);


// Skicka ny produktdata till databasen

Route::post('admin/sendCreateProduct', ["uses"=>"Admin\AdminProductsController@sendCreateProduct", "as"=> "adminSendCreateProduct"]);

