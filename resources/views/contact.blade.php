
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

	<div class="col-sm-12">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Kontakt information</h2>
	    				<div class="text-center">
					    <address>
	    					<p>Smycken</p>
							<p>Nordenflychtsvägen 76</p>
							<p>Stockholm</p>
							<p>0737069808</p>
							<p>info@erika.se</p>
						</address>
						</div>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Sociala medier</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	

			<div class="container">
					<div class="row">
						<div class="col-sm-12">
						<h2 class="text-center"></h2>
					</div>
				</div>
			</div>
	</section>

@endsection
