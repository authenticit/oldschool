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
                                            <th>Action</th>
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
                                                @endif

                                                <td>
                                                    @if ($w->status == 'pending')
                                                        <span class="badge badge-danger">Pending</span>
                                                    @else
                                                        <span class="badge badge-primary">Completed</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    
                                                    <form action="{{ route('withdraw.accept', $w->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-success btn-sm" type="submit">
                                                            <i class="fa fa-check">Approve</i>
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('withdraw.reject', $w->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-warning btn-sm" type="submit">
                                                            <i class="fa fa-close">Reject</i>
                                                        </button>
                                                    </form>
                                                    
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
