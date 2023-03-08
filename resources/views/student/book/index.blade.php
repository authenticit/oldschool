@extends('layouts.front')

@section('title')
Orders
@endsection


@section('content')

<!-- User Dashboard Area Start -->
<section class="user-dashboard">


  <div class="user-dashboard-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="heading-title">
                    {{__('Purchase History')}}
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
                <div class="purchase-list">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('#Order') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Payment Type') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <h4 class="title">
                                            {{ $order->order_number }}
                                        </h4>
                                    </td>
                                    <td>
                                        <div class="date">
                                            {{ date('D',strtotime($order->created_at)) }}, {{ date('d-M-Y',strtotime($order->created_at)) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price">
                                            ৳{{ $order->pay_amount  }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="payment-type">
                                            {{ $order->method }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="payment-type">
                                            {{ $order->status }}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('book.success',$order->order_number) }}" class="mybtn1">{{ __('View Details') }}</a>
                                        
                                        @if($order->status == 'Pending')
                                        <a href="{{ route('book.order',$order->order_number) }}" class="mybtn1">{{ __('Pay Now') }}</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- User Dashboard Area End -->

@endsection
