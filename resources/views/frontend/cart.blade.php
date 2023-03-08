@extends('layouts.front')
@section('title', 'lol')
@section('content')
    <!--Main Breadcrumb Area Start -->
    <div class="main-breadcrumb-area"
        style="background-image: url({{ $gs->breadcumb_banner ? asset('assets/images/' . $gs->breadcumb_banner) : asset('assets/images/noimage.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="pages">
                        <li>
                            <a href="{{ route('front.index') }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('front.cart') }}">
                                {{ __('Cart') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Main Breadcrumb Area End -->
    <!-- Cart Area Start -->
    <section class="cartpage">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-area">
                        <div class="cart-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Photo') }}</th>
                                        <th width="40%">{{ __('Name') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th><i class="icofont-close-squared-alt"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Session::has('cart'))
                                        @foreach ($courses as $course)
                                            <tr class="cremove{{ $course['item']['id'] }}">
                                                <td class="product-img">
                                                    <div class="item">
                                                        <img src="{{ $course['item']['photo'] ? asset('assets/images/courses/' . $course['item']['photo']) : asset('assets/images/noimage.png') }}"
                                                            alt="">

                                                    </div>
                                                </td>

                                                <td class="product-img">
                                                    <div class="item">

                                                        <p class="name"><a
                                                                href="{{ route('front.course', $course['item']['slug']) }}">{{ mb_strlen($course['item']['title'], 'UTF-8') > 55 ? mb_substr($course['item']['title'], 0, 55, 'UTF-8') . '...' : $course['item']['title'] }}</a>
                                                        </p>
                                                    </div>
                                                </td>

                                                <td class="unit-price quantity">
                                                    <p class="product-unit-price m-0">
                                                        {{ $curr->sign }}{{ round($course['price'] * $curr->value, 2) }}
                                                    </p>

                                                </td>

                                                <td>
                                                    <span class="removecart cart-remove"
                                                        data-class="cremove{{ $course['item']['id'] }}"
                                                        data-href="{{ route('course.cart.remove', $course['item']['id']) }}"><i
                                                            class="icofont-ui-delete"></i> </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @if (Session::has('cart'))
                    <div class="col-lg-4">
                        <div class="right-area">
                            <div class="order-box">
                                <h4 class="title">{{ __('PRICE DETAILS') }}</h4>

                                <div class="total-price">
                                    <p>
                                        {{ __('Total') }}
                                    </p>
                                    <p>
                                        <span
                                            class="main-total">{{ Session::has('cart') ? $curr->sign . round($totalPrice * $curr->value, 2) : '0.00' }}</span>
                                    </p>
                                </div>
                                <a href="{{ route('front.checkout') }}" class="order-btn">
                                    {{ __('অর্ডার করুন') }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Cart Area End -->
@endsection
