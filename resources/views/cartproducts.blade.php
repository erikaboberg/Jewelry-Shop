@extends('layouts.index') 


@section('center') 

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Hem</a></li>
                  <li class="active">Varukorg</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Produkt</td>
                            <td class="description"></td>
                            <td class="price">Pris</td>
                            <td class="quantity">Antal</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($cartItems->items as $item)

                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{Storage::disk('local')->url('product_img/'.$item['data']['image'])}}" width="100" height="100" style="max-height:100px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$item['data']['name']}}</a></h4>
                                <p>Produktid: {{$item['data']['id']}}</p>
                                <p>{{$item['data']['description']}} </p>
                                <p>Kategori:{{$item['data']['type']}} </p>
                            
                            </td>
                            <td class="cart_price">
                                <p>{{$item['data']['price']}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ route('IncreaseSingleProduct',['id' => $item['data']['id']]) }}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$cartItems->totalQuantity}}" autocomplete="off" size="2">
                                    <a class="cart_quantity_down" href="{{ route('DecreaseSingleProduct',['id' => $item['data']['id']]) }}"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$item['totalSinglePrice']}}</p>
                            </td>
                            <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ route('DeleteItemFromCart',['id' => $item['data']['id']]) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

            

                    @endforeach
                    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Fortsätt</h3>
            </div>
            <div class="row">       
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Antal varor<span>{{$cartItems->totalQuantity}}</span></li>
                            <li>Totalpris varukorg<span>{{$cartItems->totalPrice}}</span></li>
                            <li>Frakt <span>Fri Frakt</span></li>
    
                        </ul>
    
                            <a class="btn btn-default check_out" href="">Fortsätt till Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->


    @endsection









