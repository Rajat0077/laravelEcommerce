@extends('layouts/checkout_product')
@section('content')

<?php 

$cart_product = Cart::content();

//  echo "<pre>";
//  print_r($cart_product);    //// This Section is For Seeing d Products Details In Cart Section ...
//  echo "</pre>";
//  exit();

?>
<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Product Id</td>
							<td class="description"> Name </td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>

						@foreach($cart_product as $cart_products)
						<tr>
							<td class="cart_product">
								<a href=""><img src="imagesss/{{$cart_products->options->image}}" height="100" width="100" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""> {{$cart_products->name}} </a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$cart_products->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">

									<form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$cart_products->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$cart_products->rowId}}">
									<input type="submit" value="update" class="btn btn-success">
									</form>

								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cart_products->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/' . $cart_products->rowId )}}"><i class="fa fa-times"></i></a>
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
			
			<div class="row">
				<div class="col-sm-12">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span> {{ Cart::subtotal() }}</span></li>
							<li>Eco Tax <span>{{ Cart::tax() }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>

							<?php 
							$last_insert_id = Session::get('last_insert_id');
							?>

							@if($last_insert_id != null)
							<a class="btn btn-default check_out" href="{{URL::to('/checkout/')}}">Check Outt</a>
							@else
							<a class="btn btn-default check_out" href="{{URL::to('/login-check/')}}">Check Out</a>
							@endif

							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection