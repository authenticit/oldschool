@extends('frontend.instructor.instructor_dashboard')
@section('title', $title)
@section('content')
<div class="container-fluid">

    <div class="row clearfix">
        


        <div class="col-lg-12">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body btn btn-sm btn-success">
                        <h5 class="card-title">Total Amount</h5>
                        <span class="text-white text-bold">{{$balance}}</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body btn btn-sm btn-warning">
                        <h5 class="card-title">Pending Withdrawal</h5>
                        
                        
                        <span class="text-white text-bold">{{ $pending_amount }}</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body btn btn-sm btn-secondary ">
                        <h5 class="card-title">Complete Amount</h5>
                        <span class="text-white text-bold">{{$new_balance}}</span>
                    </div>
                </div>
            </div>
           
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>Make</strong> Withdrawal </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('withdraw.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf



                        <div class="form-group form-float">
                            <label for="name">Enter your Amount</label>
                            <input type="number" class="form-control" placeholder="Enter your amount" id="amount" name="amount">
                            @if ($errors->has('amount'))
                            <span id="title_error" style="color: red">{{ $errors->first('amount') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label for="name">Payable Amount</label>
                            <input type="number" class="form-control" placeholder="0.00" id="payable" name="payable" readonly>
                            @if ($errors->has('payable'))
                            <span id="title_error" style="color: red">{{ $errors->first('payable') }}</span>
                            @endif
                        </div>



                        <div class="row">
                            <div class="col-md-12 ">

                                <!-- Billing Details -->
                                <div class="billing-details">

                                    <div id="accordion">

                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Bkash Info
                                                    </button>

                                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                        Nogod Info
                                                    </button>

                                                    <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Rocket Info
                                                    </button>

                                                    <button class="btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Bankaccount Info
                                                    </button>

                                                </h5>
                                            </div>


                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="number" class="form-control" placeholder="Enter your Bkash Number" name="bkash_no">
                                                </div>
                                            </div>


                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="number" class="form-control" placeholder="Enter your Nogod Number" name="nogod_no">
                                                </div>
                                            </div>


                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="number" class="form-control" placeholder="Enter your Rocket Number" name="rocket_no">

                                                </div>
                                            </div>


                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="number" class="form-control" name="account_no" placeholder="Bank Account Number">
                                                    <input type="text" class="form-control mt-2" name="account_name" placeholder="Bank Account Name">
                                                    <input type="text" class="form-control mt-2" name="account_branch" placeholder="Bank Account Branch">


                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>





                </div>



                <button type="submit" class="btn btn-success btn-sm">{{ __('Save') }}</button>

                </form>
            </div>
        </div>
    </div>

</div>
</div>

@endsection



@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>
    $('#amount, #payable ').keyup(function() {
        var amount = parseFloat($('#amount').val()) || 0;
        var pay = parseFloat($('#payable').val()) || 0;


        $('#payable').val(amount - (amount * 0.3));

    });
</script>

<script>
    var bkash_btn = document.getElementById('bkash');
    var bkash_section = document.getElementById('bkash_form');

    var nogod_btn = document.getElementById('nogod');
    var nogod_section = document.getElementById('nogod_form');

    bkash_btn.addEventListener('click', function() {
        bkash_section.classList.toggle('d-none');

    });

    nogod_btn.addEventListener('click', function() {
        nogod_section.classList.toggle('d-none');
    });
</script>

@endsection