@extends('layouts.admin')
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
                                            <th width="10%">#</th>
                                            <th style="text-align: left;">Instructor</th>
                                            <th> Amount</th>
                                            <th>Payable</th>
                                            <th>Type</th>
                                            <th>Number</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($withdraws as $w)
                                            <tr>
                                                <td>{{ $w->id }}</td>
                                                <td>{{ $w->user->name }}</a>
                                                </td>
                                                <td>{{ $w->amount }}</td>
                                                <td>{{ $w->payable }}</td>
                                                <td>{{ $w->type }}</td>
                                                @if ($w->type == 'Bkash')
                                                    <td>{{ $w->bkash_no }}</td>
                                                @elseif($w->type == 'Nogod')
                                                    <td>{{ $w->nogod_no }}</td>
                                                @elseif($w->type == 'Rocket')
                                                    <td>{{ $w->rocket_no }}</td>
                                                @elseif($w->type == 'Bank')
                                                    <td>{{ $w->bank_no }}</td>
                                                @else
                                                <td>No Number </td>
                                                @endif

                                                <td>
                                                    @if ($w->status == 'pending')
                                                        <span class="badge badge-danger">Pending</span>
                                                    @elseif($w->status == 'completed')
                                                        <span class="badge badge-primary">Completed</span>
                                                    @elseif($w->status == 'reject')
                                                    <span class="badge badge-secondary">Rejected</span>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
