@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">

  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h2><strong>Facebook Settings</strong> Create </h2>
        </div>
        <div class="card-body">
          <form action="{{ route('facebook.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="inp-name">{{ __('App ID') }} *</label>
              <small>{{ __('(Get Your App ID from developers.facebook.com)') }}</small>
              <!-- if facebook has app_id is valued then show ites value-->
              @if($facebook->app_id)
                <input type="text" class="form-control" id="inp-name" name="app_id" value="{{ $facebook->app_id }}">
              @else
              <input name="app_id" type="text" class="input-field" placeholder="{{ __('Enter App ID') }}" required="">
              @endif
            </div>

            <div class="form-group">
              <label for="inp-name">{{ __('App Secret') }} *</label>
              <small>{{ __('(Get Your App Secret from developers.facebook.com)') }}</small>
              @if($facebook->app_secret)
                <input type="text" class="form-control" id="inp-name" name="app_secret" value="{{ $facebook->app_secret }}">
              @else
              <input name="app_secret" type="text" class="input-field" placeholder="{{ __('Enter App Secret') }}" required="">
              @endif
            </div>

            <div class="form-group">
              <label for="inp-name">{{ __('Website URL') }} *</label>
              @if($facebook->web_url)
                <input type="text" class="form-control" id="inp-name" name="web_url" value="{{ $facebook->web_url }}">
              @else
              <input name="web_url" type="text" class="input-field" placeholder="{{ __('Website URL') }}">
              @endif
            </div>

            <div class="form-group">
              <label for="inp-name">{{ __('Valid OAuth Redirect URI') }} *</label>
              <small>{{ __('(Copy this url and paste it to your Valid OAuth Redirect URI in developers.facebook.com.)') }}</small>
              @if ($facebook->redirect_url)
                <input type="text" class="form-control" id="inp-name" name="redirect_url" value="{{ $facebook->redirect_url }}">
              @else
              <input name="redirect_url" type="text" class="input-field" placeholder="{{ __('Enter Site URL') }}">
              @endif
            </div>


            <a href="{{ route('facebook.edit', $facebook->id) }}"><button type="button" name="action_button" id="action_button" class="btn btn-success waves-effect">Update</button></a>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="confirm_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    
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