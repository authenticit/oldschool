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
				<div class="w-100 text-center">
					<h4 class="pb-2" style="color: #026c02; font-size: 25px; font-weight: bold">SUCCESS</h4>

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
									{{ $order->quantity }} x {{ $curr->sign }}<span>{{ round(($order->book['price'] * $curr->value),2) }}</span>
								</div>
							</td>
							<td style="width: 10%">
								<span class="item-price">
									{{ $curr->sign }}<span id="price">{{ round(($order->pay_amount * $curr->value),2) }}</span>
								</span>
							</td>
						</tr>
					</table>

					<div class="text-center" style="margin-top: 100px">
						<a href="{{ route('book.index') }}" class="payment-button">{{ __('আরও বই কিনুন') }}</a>
					</div>


				</div>
				
			</div>
		</div>
	</div>
</section>
<!-- Login Area End -->

@endsection

@section('scripts')



@endsection