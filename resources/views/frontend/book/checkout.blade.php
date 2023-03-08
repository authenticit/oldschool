@extends('layouts.front')


@section('content')
    <!-- Login Area Start -->
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
                                    <img src="{{ url('assets/images/courses', $order->book->image) }}"
                                        style="width: 100%;">
                                </td>
                                <td style="width: 65%">
                                    <p class="item-title">{{ $order->book['name'] }}</p>
                                    <p class="by-owner">{{ __('By') }} {{ $order->book->user->name }}</p>
                                </td>
                                <td style="width: 10%">
                                    <span class="item-price">
                                        ৳{{ round($order->book['sale_price']) }}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="w-100 float-left mt-4 indicated-price">
                        <div class="float-right total-price text-right pr-1">
                            ৳{{ round($order->book['sale_price']) }}</div>
                        <div class="float-right total pr-2">{{ __('Total') }}</div>
                    </div>
                    <div class="w-100 float-left mt-1">
                        <form action="{{ route('payment.book.submit', $order->order_number) }}" method="post" class="checkoutform form">
                            @csrf
                            <input type="hidden" name="order_number" value="{{ $order->order_number }}">
                            <input type="hidden" name="amount" value="{{ $order->book['sale_price'] }}">
                            <button type="submit" class=" float-right btn btn-primary">{{ __('পে করুন') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Area End -->
@endsection