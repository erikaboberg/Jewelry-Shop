<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Cart;



class ProductsController extends Controller
{


    public function index() {


    // Ger all data
    // $products = Product::all();

    // Visar endast 3 
        $products = Product::paginate(6);
        
    // Funktionen compact skickar arrayen $products till view-filen allproducts.blade.php

        return view("allproducts", compact("products"));

    }


    // Laravel query builder
   // Hämtar från databasen, tabellen type och värdet.
   public function halsbandProducts () {

    $products = DB::table('products')->where('type', "Halsband")->get();
    return view("halsbandProducts", compact("products"));

    }

    public function armbandProducts () {

        $products = DB::table('products')->where('type', "Armband")->get();
        return view("armbandProducts", compact("products"));

    }

    public function ringarProducts () {

        $products = DB::table('products')->where('type', "Ringar")->get();
        return view("ringarProducts", compact("products"));
        
    }

    public function contact () {
        
        return view("contact", compact("products"));
    }

    // Like hittar alla produkter som har liknande text som sökningen
    public function search(Request $request){

        $searchText = $request->get('searchText');
        $products = Product::where('name',"Like",$searchText."%")->paginate(3);
        return view("allproducts",compact("products"));
    }


    public function orhangenProducts () {

        $products = DB::table('products')->where('type', "Örhängen")->get();
        return view("orhangenProducts", compact("products"));
        
    }

     // Funktion deklarerad i routes
    // Pass the request that is going acess the section that I store
    // Laravel using the session, retrieving data.
    // https://laravel.com/docs/5.8/session#retrieving-data
    // Första gången denna kommer anropas kommer den vara tom
    
  
    public function addProductToCart (Request $request, $id ) {


        
        $shoppingCart = $request->session()->get('cart');
        // dd($shoppingCart);
        $cart = new Cart($shoppingCart);

        
    // pass the complete info with the function find
        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        // dump($cart);

    // tillbaka till alla produkter

        return redirect()->route("allproducts");
    }


    // session hämta kundvagn
    // ifall kund vagnen inte är tom visa view
    // annars returerna kund tillbaka till huvudsida

    public function showCart () {


        $cart = Session::get('cart');

        if($cart) {

            return view('cartproducts', ['cartItems'=> $cart]);

        }else{

            return redirect()->route("allproducts");

        }     
    }

    // Request för att komma åt varukorgen och skicka med id
    public function deleteItemFromCart (Request $request, $id ) {

        $cart = $request->session()->get("cart");

        if(array_key_exists($id,$cart->items)){

    // php funktion som tar bort ett objekt från en array
            unset ($cart->items[$id]);

    // räkna om antal produkter och totalpris efter vara är borttagen
  
        }

        $shoppingCart = $request->session()->get("cart");
        $updatedCart = new Cart ($shoppingCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put("cart", $updatedCart);

        return redirect()->route("cartproducts");
  
    }

    // Ändra antalet produkter i varukorg med öka/minska funktionen.
    // Hämtar varukorgen med hjälp av session
    // Skapar nytt objekt new Cart och skickar med shoopingCart
    // Använder id för att hämta information om produkten från databasen
    // Använder cart objekt och addItem för att lägga till produkten i varukorgen igen
    // Finns redan produkten i varukorgen kommer antalet att ökas

    

    public function increaseSingleProduct (Request $request, $id) {


        $shoppingCart = $request->session()->get('cart');
        $cart = new Cart($shoppingCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route("cartproducts");

    }

    // Fungerar lite annorlunda mot ovanstående
    // if sats för att kolla om antalet är större än 1

    public function decreaseSingleProduct (Request $request, $id) {

    $shoppingCart = $request->session()->get('cart');
    $cart = new Cart($shoppingCart);

    if( $cart->items[$id]['quantity'] > 1){
              $product = Product::find($id);
              $cart->items[$id]['quantity'] = $cart->items[$id]['quantity']-1;
              $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] *  $product['price'];
              $cart->updatePriceAndQuantity();
          
              $request->session()->put('cart', $cart);

        }

        return redirect()->route("cartproducts");

    }

}


