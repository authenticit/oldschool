@extends('layouts.front')

@section('title')
Order#{{ $order->order_number }}
@endsection

@section('content')


<!-- Login Area Start -->
<section class="new-login">
	<div class="container checkout">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="w-100">
					<p class="pb-2 payment-header">{{ __('অর্ডার') }}</p>

					<table class="table w-100">
						<tr>
							<td style="width: 5%"><span class="count-item">1</span></td>
							<td style="width: 20%">
								<img src="{{asset('assets/images/book/'.$order->book['image'])}}" style="width: 100%;">
							</td>
							<td style="width: 65%">
								<p class="item-title">{{ $order->book['name'] }}</p>
								<p class="by-owner">{{ __('By') }} {{ $order->book['owner']['name'] }}</p>
								<div class="quantity">
									<div class="row">
										<div class="col-3">
											<button id="minus"><i class="fas fa-minus"></i></button>
										</div>
										<div class="col-6">
											<input type="text" name="quantity" id="quantity" class="quantity-field" value="{{ $order->quantity }}" readonly>
										</div>
										<div class="col-3">
											<button id="plus"><i class="fas fa-plus"></i></button>
										</div>
									</div>
								</div>
							</td>
							<td style="width: 10%">
								<span class="item-price">
									{{ $curr->sign }}<span id="price">{{ round(($order->book['price'] * $curr->value),2) }}</span>
								</span>
							</td>
						</tr>
					</table>



				</div>



				<div class="w-100 float-left mt-4 indicated-price">
					<div class="float-right total-price text-right">{{ $curr->sign }} <span id="total_price">{{ round(($order->book['price'] * $curr->value),2) }}</span></div>
					<div class="float-right total">{{ __('মোট') }}</div>
				</div>
				<div class="w-100 float-left">


					<form action="{{ route('book.pay') }}" method="post" class="checkoutform form">

						@csrf
						<input type="hidden" name="order_number" value="{{ $order->order_number }}">
						<input type="hidden" name="quantity" id="final_quantity" value="{{ $order->quantity }}">
						<input type="hidden" name="amount" id="amount" value="{{ $order->book['price'] }}">

						<button type="submit" class="payment-button float-right">{{ __('পে করুন') }}</button>

					</form>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- Login Area End -->

@endsection

@section('scripts')

<script>
	$('#plus').click(function(event) {
		var c_quantity = $('#quantity').val();

		
		var new_quantity = parseInt(c_quantity) + 1;

		var price = $('#price').html();
		var total = parseInt(price) * parseInt(new_quantity);

		$('#quantity').val(new_quantity);
		$('#final_quantity').val(new_quantity);

		$('#amount').val(parseInt(total));
		$('#total_price').html(parseInt(total));
		

		
		
	});


	$('#minus').click(function(event) {
		var c_quantity = $('#quantity').val();

		if(c_quantity > 1){
			var new_quantity = parseInt(c_quantity) - 1;

			var price = $('#price').html();
			var total = parseInt(price) * parseInt(new_quantity);

			$('#quantity').val(new_quantity);
			$('#final_quantity').val(new_quantity);

			$('#amount').val(parseInt(total));
			$('#total_price').html(parseInt(total));
		}
		
		
	});
</script>

@endsection