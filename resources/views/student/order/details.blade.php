@extends('layouts.front')

@section('title')
Order Details
@endsection


@section('content')

<!-- User Dashboard Area Start -->
<section class="user-dashboard">


  <div class="user-dashboard-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading-title">
                    {{__('Purchase Details')}}
                </h4>
                @include('student.includes.nav')
            </div>
        </div>
    </div>
</div>

<div class="user-dashboard-content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-invoice">
                    <main class="columns">
                        <div class="inner-container">

                            <div class="table-responsive">
                                <table class="table invoice">
                                    <tbody>
                                        <tr class="header">
                                            <td class="">
                                                <img src="{{ asset('assets/images/'.$gs->logo) }}" alt="Company Name">
                                            </td>
                                            <td class="align-right">
                                                <h2>{{__('Invoice')}}</h2>
                                            </td>
                                        </tr>
                                        <tr class="intro">
                                            <td class="">
                                                <strong>{{ __('Name') }}:</strong> {{ $order->user->name }}<br>
                                                @if($order->user->phone == null)
                                                <strong>{{ __('Email') }}:</strong> {{ $order->user->email }}
                                                @else
                                                <strong>{{ __('Phone') }}:</strong> {{ $order->user->phone }}
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <strong>{{ __('Order Number') }}:</strong> {{ $order->order_number }}<br>
                                                <strong>{{ __('Purchase Date') }}:</strong> {{ date('l m, Y', strtotime($order->created_at))  }}
                                            </td>
                                        </tr>


                                        <tr class="details">
                                            <td colspan="2">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                {{ __('Course Name') }}
                                                            </th>
                                                            
                                                            <th>
                                                                {{ __('Price') }}
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="item">
                                                            <td>
                                                                {{ $course->title }}
                                                            </td>
                                                            
                                                            <td>
                                                                ৳ {{ $course->price }}
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="totals">
                                            <td></td>
                                            <td>
                                                <table class="table">
                                                    <tbody>
                                                        <tr class="total">
                                                            <td class="label text-right">{{ __('Total') }}</td>
                                                            <td class="num">৳ {{ $course->price }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- User Dashboard Area End -->

@endsection
