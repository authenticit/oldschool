@extends('frontend.artist.base')
@section('title', $title)

@section('css')

<link rel="stylesheet" href="{{ asset('assets/artist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/xzoom.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/artist/css/responsive.css') }}">

@endsection

@section('content')

<section class="new-login">
    <div class="container checkout">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="w-100">
                    <p class="pb-2 payment-header">Book</p>
                    <table class="table w-100">
                        <tr>
                            <td style="width: 5%"><span class="count-item">1</span></td>
                            <td style="width: 20%">
                                <img src="{{ url('/images/artist/art_work', $order->artworks->image) }}"
                                    style="width: 100%;">
                            </td>
                            <td style="width: 65%">
                                <p class="item-title">{{ $order->artworks['title'] }}</p>
                                <p class="by-owner">{{ __('By') }} {{ $order->artworks->artist->name }}</p>
                            </td>
                            <td style="width: 10%">
                                <span class="item-price">
                                    ৳{{ round($order->artworks['price']) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="w-100 float-left mt-4 indicated-price">
                    <div class="float-right total-price text-right pr-1">
                        ৳{{ round($order->artworks['price']) }}</div>
                    <div class="float-right total pr-2">{{ __('Total') }}</div>
                </div>
                <div class="w-100 float-left mt-1">
                    <form action="{{ route('payment.artwork.submit', $order->order_number) }}" method="post" class="checkoutform form">
                        @csrf
                        <input type="hidden" name="order_number" value="{{ $order->order_number }}">
                        <input type="hidden" name="amount" value="{{ $order->artworks['price'] }}">
                        <button type="submit" class=" float-right btn btn-primary">{{ __('পে করুন') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




@endsection


@section('script')
<script src="{{ asset('assets/artist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/jqueryall.2.2.4.js') }}"></script>
<script src="{{ asset('assets/artist/js/xzoom.min.js') }}"></script>
<script src="{{ asset('assets/artist/js/script.js') }}"></script>
@endsection