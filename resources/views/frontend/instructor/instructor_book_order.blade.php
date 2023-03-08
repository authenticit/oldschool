@extends('frontend.instructor.instructor_dashboard')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="exhibition_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>Order No</th>
                                            <th>User</th>
                                            <th>Payable</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                                    
                                            $total = 0;
                                                    
                                        @endphp
                                        @foreach ($orders as $b)
                                            <tr>

                                                <td>{{ $b->order_number }}</td>
                                                @if ($b->user)
                                                <td>{{$b->user->name}}</td>
                                                @endif
                                                
                                                
                                                @if($b->pay_amount)
                                                @php
                                                    
                                                    $subtotal = ($b->pay_amount * 0.7);
                                                    $total += $subtotal;
                                                @endphp
                                                @endif
                                                <td>{{ $subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td class="text-danger">Total</td>
                                            <td class="text-danger"> &#2547;
                                                {{ $total }}</td>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end">
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <!-- Dropify -->
    <script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
    <script>
        $('#image').dropify();
    </script>
@endsection
