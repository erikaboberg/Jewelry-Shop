@extends('layouts.index')

    @section('center')

	<section id="cart_items">
		<div class="container">



			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Hem</a></li>
				  <li class="active">Varukorg</li>
				</ol>
			</div><!--/breadcrums-->

		
			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Orderinformation</p>


							<div class="form-one">
              <form action="./createNewOrder" method="post">

					
						

									<input type="text" placeholder="E-postadress">
									<input type="text" placeholder="Förnamn *">
									<input type="text" placeholder="Efternamn*">
                  <input type="text"  placeholder="Personnummer">

                 <button class="btn btn-default check_out" type="submit" name="submit">Till betalning</button>


								</form>
						</div>
        </div>
			</div>
		</div>
	</div>


</section>
	
  @endsection