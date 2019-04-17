<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminProductsController extends Controller {


    // funktion visa alla produkter
   // paginate hur många produkter som visas innan man klickar nästa
    public function index(){

        //$products = Product::all();
        $products = Product::paginate(3);

        return view("admin.displayProducts", ['products'=>$products]);

    }

    // returnerna view createProduct.blade 
    public function createProduct() {

        return view('admin.CreateProduct');

    }

    // Skickar ny produktdata till databasen
    public function sendCreateProduct (Request $request) {

        $name =  $request->input('name');
        $description =  $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');

        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();
        
        $ext =  $request->file("image")->getClientOriginalExtension();
        $stringImageReFormat = str_replace(" ","",$request->input('name'));

        $imageName = $stringImageReFormat.".".$ext; //ring.jpg
        $imageEncoded = File::get($request->image);
        Storage::disk('local')->storeAs('public/product_img/'.$imageName, $imageEncoded);

        $newProductArray = array("name"=>$name, "description"=> $description,"image"=> $imageName,"type"=>$type,"price"=>$price);

        $created = DB::table("products")->insert($newProductArray);


        if($created){
            return redirect()->route("admin.displayProducts");

        }else{
            
           return "Produkten skapades inte";

        }

    }



    //funktion visa ändra produkt
    // för att hämta produkt från databasen använder jag $product = Product::find($id);
    // returnerar sedan produkt till editProduct view

    public function editProduct($id){
        $product = Product::find($id);
         return view('admin.EditProduct',['product'=>$product]);

    }


    //funktion visa ändra bild 
    public function editProductImage($id){
        $product = Product::find($id);
        return view('admin.EditProductImage',['product'=>$product]);
    }

    // Validator hanterar denna process genom make som tar två paramterar request och image. 
    // och funktionen all, som tar all data som är skickad med post requesten.
    // required för att man inte ska kunna klicka på submit utan att ladda upp någon ny bild
    // validera vilken typ av fil som laddas upp, en bild, mimes vilka filtyper som tillåts + storleken på bild max: 5000 kb.
    // if sats för att kolla att filen som ska laddas upp finns
    // hasFile namnet på filen
    // Storage disk local som bilderna ligger på, URL'n public/product_img.
    // Genom Product:find modellen och id 
    

 
    public function updateProductImage(Request $request,$id) {


        Validator::make($request->all(),['image'=>"required|file|image|mimes:jpg,png,jpeg|max:5000"])->validate();


        if($request->hasFile("image")){

          $product = Product::find($id);
          $exists = Storage::disk('local')->exists("public/product_img/".$product->image);

        // Ta bort gamla bilden, mappen från storage och namet på bilden.


        if($exists) {

            Storage::delete('public/product_img/'.$product->image);

         }
        // Ladda upp en ny bild

        // $ext = $request->file('image')->getClientOriginalExtension();

        // laddar upp bilden med storeAs funktion, URL'n till storage och namnet på bilden.

        $request->image->storeAs("public/product_img/",$product->image);


        return redirect()->route("admin.displayProducts");

    } else {

       $error = "Ingen bild vald";
       return $error;

    }
  }


// Produkten från product model 

  public function deleteProduct($id) {

    $product = Product::find($id);


        $exists = Storage::disk('local')->exists("public/product_img/".$product->image);

        if($exists) {

            Storage::delete('public/product_img/'.$product->image);

         }

// Ta bort produkten från databasen

    Product::destroy($id);

    return redirect()->route("admin.displayProducts");

  }

    // Uppdatera produktfälten, input + inputfälten från editProduct.blade

    public function updateProduct (Request $request, $id) {

        $name = $request->input('name');
        $description = $request->input('description');
        $type = $request->input('type');
        $price = $request->input('price');


     // Update array med keys från databas tabellerna   
    // Uppdatera med nya datan genom update, array med datan som ska uppdateras

        $updateArray = array("name"=>$name, "description"=>$description, "type"=>$type, "price"=>$price);

        DB::table('products')->where('id', $id)->update($updateArray);

    // return till dashboard
    // namnet på route till dashboard
     
    return redirect()->route("admin.displayProducts");

    }
}


