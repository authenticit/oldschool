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
                                            <th>#</th>
                                            <th>Course Title</th>
                                            <th>User</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                                    
                                            $total = 0;
                                                    
                                        @endphp
                                        @foreach ($orders as $key=>$b)
                                        
                                            <tr>
                                                <td>{{ ++$key }}</td>
												<td>{{ $b->title }}</td>
                                                @if($b->order)
                                                <td>{{ $b->order->user->name }}</td>
                                                @endif

                                                @if($b->order)
                                                @php
                                                    
                                                    $subtotal = ($b->order->pay_amount * 0.7);
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
                                            <td></td>
                                            <td class="text-danger">Total</td>
                                            <td class="text-danger"> {{ $total }}</td>
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
