@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Purchase Details') }}<a
                    class="btn btn-primary btn-rounded btn-sm ml-2" href="{{ route('purchase.index') }}"><i
                        class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">{{ __('All Purchase') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">{{ __('Purchase') }}</a></li>
            </ol>
        </div>
    </div>
    <section class="success">
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
                                                    <img src="{{ asset('assets/images/' . $gs->logo) }}" alt="Company Name">
                                                </td>
                                                <td class="align-right">
                                                    <h2>{{ __('Invoice') }}</h2>
                                                </td>
                                            </tr>
                                            <tr class="intro">
                                                <td class="">
                                                    <strong>{{ __('Name') }}:</strong> {{ $order->user->name }}<br>

                                                    @if ($order->user->email == '')
                                                        <strong>{{ __('Phone') }}:</strong> {{ $order->user->phone }}
                                                    @else
                                                        <strong>{{ __('Email') }}:</strong> {{ $order->user->email }}
                                                    @endif
                                                </td>
                                                <td class="text-right">
                                                    <strong>{{ __('Order Number') }}:</strong>
                                                    {{ $order->order_number }}<br>
                                                    <strong>{{ __('Purchase Date') }}:</strong>
                                                    {{ date('l m, Y', strtotime($order->created_at)) }}
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
    </section>
@endsection
