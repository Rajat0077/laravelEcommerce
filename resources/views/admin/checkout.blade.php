@extends('layouts.checkout_product')

@section('content')

<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form method="post" action="{{URL::to('save-shipping')}}" >
									{{csrf_field()}}
									<input type="text" name="shipping_first_name" placeholder="Customer Name">
									<input type="text" name="shipping_last_name" placeholder="Customer LastName">
                                    <input type="text" name="shipping_email" placeholder="Shipping Email">
                                    <input type="text" name="shipping_telephone" placeholder="Shipping Telephone">
									<input type="text" name="shipping_address" placeholder="Shipping Address">
                                    <input type="text" name="shipping_city" placeholder="Shipping City">		
                                    <input type="submit" value="Save" class="btn btn-primary">							
								</form>
							</div>

					</div>
					<div class="col-sm-4">
						
					</div>					
				</div>
			</div>

@endsection