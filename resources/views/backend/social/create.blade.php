@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">

  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h2><strong>Blog</strong> Create </h2>
        </div>
        <div class="card-body">
          <form action="{{ route('social.store') }}" method="POST">
            @csrf
            <div class="row mb-2">
              <label class="control-label col-sm-3" for="facebook">{{ __('facebook') }} *</label>
              <div class="col-sm-6">
                <input class="form-control" name="facebook" id="facebook" placeholder="{{ __('http://facebook.com/') }}" required="" type="text">
              </div>
              <div class="col-sm-3">
                <label class="switch">
                  <!-- if value is 1 then checked -->
                  
                  <input type="checkbox" name="f_status" value="1" >
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row mb-2">
              <label class="control-label col-sm-3" for="google_plus">{{ __('Google Plus') }} *</label>
              <div class="col-sm-6">
                <input class="form-control" name="google_plus" id="google_plus" placeholder="{{ __('http://google.com/') }}" required="" type="text">
              </div>
              <div class="col-sm-3">
                <label class="switch">
                  <input type="checkbox" name="g_status" value="1">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row mb-2">
              <label class="control-label col-sm-3" for="twitter">{{ __('twitter') }} *</label>
              <div class="col-sm-6">
                <input class="form-control" name="twitter" id="twitter" placeholder="{{ __('http://twitter.com/') }}" required="" type="text">
              </div>
              <div class="col-sm-3">
                <label class="switch">
                  <input type="checkbox" name="t_status" value="1" >
                  <span class="slider round"></span>
                </label>
              </div>
            </div>

            <div class="row mb-2">
              <label class="control-label col-sm-3" for="linkedin">{{ __('linkedin') }} *</label>
              <div class="col-sm-6">
                <input class="form-control" name="linkedin" id="linkedin" placeholder="{{ __('http://linkedin.com/') }}" required="" type="text">
              </div>
              <div class="col-sm-3">
                <label class="switch">
                  <input type="checkbox" name="l_status" value="">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>


            <div class="row mb-2">
              <label class="control-label col-sm-3" for="dribble">{{ __('Dribble') }} *</label>
              <div class="col-sm-6">
                <input class="form-control" name="dribble" id="dribble" placeholder="{{ __('https://dribbble.com/') }}" required="" type="text" >
              </div>
              <div class="col-sm-3">
                <label class="switch">
                  <input type="checkbox" name="d_status" value="" >
                  <span class="slider round"></span>
                </label>
              </div>
            </div>



            <button type="submit" name="action_button" id="action_button" class="btn btn-primary waves-effect">Save</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="confirm_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="loader-popup" style="display: none;">
        <img src="{{ url('backend/images/loader.gif') }}">
      </div>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Confirmation</h2>
      </div>
      <div class="modal-body">
        <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@include('backend.partials.datatable.js')


<script src="{{ asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>


<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#image').dropify();

  $('#exhibition_table').DataTable();

  $("#name").on('keyup blur', function() {
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
    $("#slug").val(Text);
  });

  $('#name').keyup(function(e) {
    if ($(this).val() != '') {
      $('#title_error').html('');
      $('#slug_error').html('');
    }
  });

  $('#slug').keyup(function(e) {
    if ($(this).val() != '') {
      $('#slug_error').html('');
    }
  });

  var medium_id;

  $(document).on('click', '.delete', function() {
    medium_id = $(this).attr('id');
    $('#confirm_modal').modal('show');
  });
</script>
@endsection