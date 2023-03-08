@extends('layouts.admin')


@section('content')


    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between">
        <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Manage Student') }}</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin-student-index') }}">{{ __('Manage Student') }}</a></li>
        </ol>
        </div>
    </div>

    <!-- Row -->
    <div class="row mt-3">
      <!-- Datatables -->
      <div class="col-lg-12 ">

        @include('includes.admin.form-success')


        <div class="card mb-4">
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="geniustable">
              <thead class="thead-light">
                <tr>
                  <th>{{ __('Photo') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Email') }}</th>
                  <th>{{ __('Status') }}</th>
                  <th>{{ __('Action') }}</th>
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

    <div class="modal fade confirm-modal" id="statusModal" tabindex="-1" role="dialog"
        aria-labelledby="statusModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __("Update Status") }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <p class="text-center">{{ __("You are about to change the status.") }}</p>
                <p class="text-center">{{ __("Do you want to proceed?") }}</p>
            </div>
            <div class="modal-footer">
            <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
            <a href="javascript:;" class="btn btn-success btn-ok">{{ __("Update") }}</a>
            </div>
        </div>
        </div>
    </div>

{{-- STATUS MODAL ENDS --}}


{{-- SECTION MODAL ADD --}}

<div class="modal fade" id="courseAssignModal" tabindex="-1" role="dialog" aria-labelledby="sectionModalAddTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __("Assign Course to Student") }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body ml-2 mr-2">

                <form class="c-form" action="{{ route('admin-student-assign-course') }}" method="POST" enctype="multipart/form-data">
                    @include('includes.admin.form-error')

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="selectStudent">{{ __('Select Course') }}</label>
                        <select class="form-control b-0 p-0" id="selectStudent" name="course_id">
                            @foreach (DB::table('courses')->get(['id','title']) as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" id="student_id" value="" name="user_id">
                    <div class="text-right">
                        <button class="btn btn-success submit-btn" type="submit">{{ __('Submit') }}</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
            <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Close") }}</a>
            </div>
        </div>
    </div>
</div>

{{-- SECTION MODAL ADD ENDS --}}


{{-- DELETE MODAL --}}

<div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog"
aria-labelledby="deleteModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">{{ __("Confirm Delete") }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>

    <div class="modal-body">
        <p class="text-center">{{ __("You are about to delete this Student. Every informtation under this student will be deleted.")}}</p>
        <p class="text-center">{{ __("Do you want to proceed?") }}</p>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">{{ __("Cancel") }}</a>
        <a href="javascript:;" class="btn btn-danger btn-ok">{{ __("Delete") }}</a>
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
               ajax: '{{ route('admin-student-datatables') }}',
               columns: [
                        { data: 'photo', name: 'photo' },
                        { data: 'name', name: 'name' },
						{ data: 'email', name: 'email' },
                        { data: 'status', searchable: false, orderable: false},
            			{ data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                	processing: '<img src="{{asset('assets/images/'.$gs->admin_loader)}}">'
                }
            });


        $(function() {
            $(".btn-area").append('<div class="col-sm-12 col-md-4 pr-3 text-right">'+
                '<a class="btn btn-primary" href="{{route('admin-student-create')}}">'+
            '<i class="fas fa-plus"></i> Add New Student'+
            '</a>'+
            '</div>');
        });

    // CURRICULAM FORM

        $(document).on('submit','.c-form',function(e){

            var $this = $(this);

            e.preventDefault();

            $this.find('.submit-btn').prop('disabled',true);

            $.ajax({
            method:"POST",
            url:$(this).prop('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                if ((data.errors)) {
                $this.find('.alert-success').hide();
                $this.find('.alert-danger').show();
                $this.find('.alert-danger ul').html('');
                    for(var error in data.errors)
                    {
                    $this.find('.alert-danger ul').append('<li>'+ data.errors[error] +'</li>')
                    }
                }
                else
                {
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('.alert-success p').html(data);
                    $('#courseAssignModal').modal('hide');
                }

                $this.find('.submit-btn').prop('disabled',false);

            }

            });

        });

// CURRICULAM FORM ENDS



</script>

<script>
    $(document).on("click",'.assignCourse',function(){
        $("#student_id").val($(this).data("id"));
    })

    $('#selectStudent').select2();

</script>

@endsection
