<?php

namespace App;

// Class cart takes care of the whole process inside ProductsController
// 3 Properties item = array som sparar alla items, quantity antalet av items i kundvagnen och totalpriset för alla items. 


class Cart {

    public $items; // [['id'] => ['quantity] => , 'price' => , 'data' =>   ]]
    public $totalQuantity;
    public $totalPrice;

   
 // Konstruktorn initerar värdet
 // Ifall shoppingCart inte är 0 och det redan finns värde i den gör detta: 
 // initiera items som är = items från shoppingCart och likadant med Quantity och price. 

    public function __construct($shoppingCart) {

        if($shoppingCart != null) {

            $this->items = $shoppingCart->items;
            $this->totalQuantity = $shoppingCart->totalQuantity; 
            $this->totalPrice = $shoppingCart->totalPrice;

 // Ifall shoppingCart är 0 ger den en tom array och värde 0. 

        } else {

            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;


        }
    }

//  Kolla om produkten redan är i shoppingCart eller inte
// För att kolla det använder jag array_kew_exist som tar id och kollar om det är i items arrayen eller inte.

    public function addItem($id,$product) {

    $price =  (float) $product->price;    

// item finns redan  
    if(array_key_exists($id,$this->items)) {

// hämtar id från items
// ++ öka antalet 
//totalSinglePrice är totalpriset för samma produkt

    $productToAdd = $this->items[$id];
    $productToAdd['quantity']++;
    $productToAdd['totalSinglePrice'] = $productToAdd['quantity'] *  $price;

// Om det är första gången item läggs till i shoppingCart
// array där quantity är 1, price från product.php och data = product 

    } else {
    
    $productToAdd = ['quantity'=> 1, 'totalSinglePrice'=> $price, 'data'=>$product];


    }

    $this->items[$id] = $productToAdd;
    $this->totalQuantity++;
    //Totalpris på alla produkter i varukorgen
    $this->totalPrice = $this->totalPrice + $price;

  }

  public function updatePriceAndQuantity() {

    $totalPrice = 0;
    $totalQuanity = 0;

    foreach($this->items as $item){

        $totalQuanity = $totalQuanity + $item['quantity'];
        $totalPrice = $totalPrice + $item['totalSinglePrice'];

    }

    $this->totalQuantity = $totalQuanity;
    $this->totalPrice =  $totalPrice;

}



}
