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
                                            <th>Amount</th>
                                            <th>Withdraw Method</th>
                                            <th>Number</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($withdrawls as $key => $b)
                                            <tr>

                                                <td>{{ ++$key }}</td>
                                                <td>{{ $b->payable }}</td>
                                                <td>{{ $b->type }}</td>
                                                @if ($b->type == 'Bkash')
                                                    <td>{{ $b->bkash_no }}</td>
                                                @elseif($b->type == 'Nogod')
                                                    <td>{{ $b->nogod_no }}</td>
                                                @elseif($b->type == 'Rocket')
                                                    <td>{{ $b->rocket_no }}</td>
                                                @elseif($b->type == 'Bank')
                                                    <td>{{ $b->bank_no }}</td>
                                                @else
                                                    <td>No Number</td>
                                                @endif
                                                <td>
                                                    <span class="badge badge-success">Completed</span>
                                                </td>

                                                @php
                                                    
                                                    $subtotal = $b->payable;
                                                    $total += $subtotal;
                                                @endphp

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
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
