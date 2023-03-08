<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="AcademyZPresso">

        <title>{{$gs->title}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/print/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/print/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/print/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/print/css/style.css')}}">
  <link href="{{asset('assets/print/css/print.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="icon" type="image/png" href="{{asset('assets/images/'.$gs->favicon)}}"> 
  <style type="text/css">

#color-bar {
  display: inline-block;
  width: 20px; 
  height: 20px;
  margin-left: 5px;
  margin-top: 5px;
}

@page { size: auto;  margin: 0mm; }
@page {
  size: A4;
  margin: 0;
}
@media print {
  html, body {
    width: 210mm;
    height: 287mm;
  }

html {

}
::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
.dashboard-content{
    padding: 18px;
}
  </style>
</head>
<body onload="window.print();">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- Starting of Dashboard data-table area -->
                    <div class="section-padding add-product-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <div class="product__header">
                                        <div class="row reorder-xs">
                                            <div class="col-lg-8 col-md-5 col-sm-5 col-xs-12">
                                                <div class="product-header-title">
                                                    <h2>{{ __('Order#') }} {{$order->order_number}} [{{$order->status}}]</h2>
                                        </div>   
                                    </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="dashboard-content">
                                                    <div class="view-order-page" id="print">
                                                        <p class="order-date">{{ __('Order Date') }} {{date('d-M-Y',strtotime($order->created_at))}}</p>




                                                        <div class="billing-add-area">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h5>{{ __('Billing Address') }}</h5>
                                                                    <address>
                                                                        {{ __('Name:') }} {{$order->user->showName()}}<br>
                                                                        {{ __('Email:') }} {{$order->user->email}}<br>

                                                                    </address>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>{{ __('Payment Information') }}</h5>
                                                                    <p>{{ __('Paid Amount:') }} {{ $order->pay_amount }}</p>
                                                                    <p>{{ __('Payment Method:') }} {{$order->method}}</p>


                                                                        @if($order->method=="Stripe")
                                                                            {{$order->method}} {{ __('Charge ID:') }} <p>{{$order->charge_id}}</p>
                                                                        @endif
                                                                        {{$order->method}} {{ __('Transaction ID:') }} <p id="ttn">{{$order->txnid}}</p>


                                                                </div>
                                                            </div>
                                                        </div>





                                                        <br>
                                                        <br>
                                                        <div class="table-responsive">
                            <table id="example" class="table">
                                <h4 class="text-center">{{ __('Purchased Courses:') }}</h4><hr>
                                <thead>
                                <tr>
                                    <th>{{ __('ID#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Total') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($cart['items'] as $course)
                                    <tr>
                                            <td>{{ $course['item']['id'] }}</td>
                                            <td>{{mb_strlen($course['item']['title'],'UTF-8') > 50 ? mb_substr($course['item']['title'],0,50,'UTF-8').'...' : $course['item']['title']}}</td>
                                            <td>
                                                {{ $curr->sign }}{{ round(($course['price'] * $curr->value),2) }}
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
                                </div>

                        </div>
                    </div>
                </div>
                <!-- Ending of Dashboard data-table area -->
            </div>
<!-- ./wrapper -->
<!-- ./wrapper -->

<script type="text/javascript">
setTimeout(function () {
        window.close();
      }, 500);
</script>
</body>
</html>
