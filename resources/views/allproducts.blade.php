
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
						<form action="search" method="get">
                        <input type="text" name="searchText" placeholder="Sök efter produkt"/>
                   	 </form>	
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<div class="container">
	@include('alert')
	</div>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">

					<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>SMYCKEN</h1>
									<p>Handgjorda smycken skapade i en tidlös design. Vårt mål är att förmedla smycken man aldrig kan tröttna på.</p>
								</div>
								<div class="col-sm-6">
									<img src="{{asset ('images/home/points.jpg') }}" class="ring img-responsive" alt="" />
								</div>
							</div>			
					   
							<div class="item">
								<div class="col-sm-6">
									<h1>SMYCKEN</h1>
									<p>Handgjorda smycken skapade i en tidlös design. Vårt mål är att förmedla smycken man aldrig kan tröttna på.</p>
								</div>

								<div class="col-sm-6">
									<img src="{{asset ('images/home/points.jpg') }}" class="ring img-responsive" alt="" />
								</div>
							</div>			
					
							<div class="item">
								<div class="col-sm-6">
									<h1>SMYCKEN</h1>
									<p>Handgjorda smycken skapade i en tidlös design. Vårt mål är att förmedla smycken man aldrig kan tröttna på. Rätt smycke kan lyfta vilken outfit som helst. </p>
								</div>

								<div class="col-sm-6">
									<img src="{{asset ('images/home/points.jpg') }}" class="ring img-responsive" alt="" />
								</div>
							</div>			
					    </div>	
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					
					</div>
				</div>
			</div>
		</div>
   </div>
	</section><!--/slider-->
	
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


					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Alla Produkter</h2>
                        

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
											<p>{{ $product->description }}</p>
											<a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lägg i kundvagn</a>
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

						{{$products->links()}}
							
					</div><!--features_items-->

				
										
		
					<div class="recommended_items"><!--recommended_items-->
						<!-- <h2 class="title text-center">Rekommenderat</h2> -->

						@foreach ($products as $product)
			
									<!-- <div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center"> -->
												<!-- {{$product->id}} -->
												<!-- <img src="{{Storage::disk('local')->url('product_img/'.$product->image) }}" alt="" />
													<h2>{{ $product->price }}</h2>
													<p>{{ $product->name }}</p>
													<a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Lägg i kundvagn</a>
												</div>
											</div>
										</div>
									</div> -->
						@endforeach	
				</div><!--/recommended_items-->
	</section>

@endsection

