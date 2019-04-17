
@extends('layouts.index') 

<!-- Namn på sektionen för definera sektionen från index.blade -->
@section('center') 

<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="{{route('allproducts')}}" class="active">Hem</a></li>
								<li class="dropdown"><a href="#">Shoppa<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="{{route('allproducts')}}">Produkter</a></li>
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="{{route('cartproducts')}}">Varukorg</a></li> 
										<li><a href="/login">Logga in</a></li> 
                                    </ul>
                                </li> 
								<li><a href="{{route('contact')}}" class="active">Kontakt</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategorier</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('orhangenProducts')}}">Örhängen</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('armbandProducts')}}">Armband</a></h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('ringarProducts')}}">Ringar</a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{route('halsbandProducts')}}">Halsband</a></h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Övrigt</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						
						<div class="price-range"><!--price-range-->
							<h2>Prisklass</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">sek0</b> <b class="pull-right">sek600</b>
							</div>
						</div><!--/price-range-->

					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Halsband</h2>
                        

                        @foreach ($products as $product)
                      
                         <!-- Hämtar dynamisk data från databasen pris, namn på produkt  -->    
						<!--  Storage inbyggd funktion som hämtar från mappen storage sedan append till bilderna i databasen-->
						<!--  a href array -->

                    	<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
							
 
								<!-- {{$product->id}} -->
								<img src="{{Storage::disk('local')->url('product_img/'.$product->image) }}" alt="" />
                                            <h2>{{ $product->price }}</h2>
											<p>{{ $product->name }}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lägg i kundvagn</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{ $product->price }}<h2>
												<p>{{ $product->name }}</p>
												<p>{{ $product->description }}</p>
												<a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lägg i kundvagn</a>

											</div>
										</div>
								</div>
							</div>
						</div>

                        @endforeach
							
					</div><!--features_items-->
					
				</div>
			</div>
		</div>
	</section>

@endsection
