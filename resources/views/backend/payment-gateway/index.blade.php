@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Payment Gateways') }}</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('payment.index') }}">{{ __('Payment Gateways') }}</a></li>
            </ol>
        </div>
    </div>
    <!-- Row -->
    <div class="row mt-3">
        <!-- Datatables -->
        <div class="col-lg-12">
            @include('includes.admin.form-success')
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="geniustable">
                        <thead class="thead-light">
                            <tr>
                                <th width="30%">{{ __('Name') }}</th>
                                <th width="40%">{{ __('Photo') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Options') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- DataTable with Hover -->

    </div>
    <!--Row-->


    {{-- STATUS MODAL --}}

    <div class="modal fade confirm-modal" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Update Status') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">{{ __('You are about to change the status.') }}</p>
                    <p class="text-center">{{ __('Do you want to proceed?') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</a>
                    <a href="javascript:;" class="btn btn-success btn-ok">{{ __('Update') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- STATUS MODAL ENDS --}}


    {{-- DELETE MODAL --}}

    <div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Confirm Delete') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">{{ __('You are about to delete this Payment.') }}</p>
                    <p class="text-center">{{ __('Do you want to proceed?') }}</p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</a>
                    <a href="javascript:;" class="btn btn-danger btn-ok">{{ __('Delete') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- DELETE MODAL ENDS --}}

@endsection
@section('scripts')
    <script type="text/javascript">
        var table = $('#geniustable').DataTable({
            ordering: false,
            processing: true,
            serverSide: true,
            ajax: '{{ route('payment.data-tables') }}',
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'photo',
                    name: 'photo'
                },
                {
                    data: 'status',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false
                }

            ],
            language: {
            }
        });
    </script>
@endsection
