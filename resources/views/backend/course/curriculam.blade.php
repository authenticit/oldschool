@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Set Curriculam') }} <a class="btn btn-primary btn-rounded btn-sm" href="{{route('admin-course-index')}}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin-course-index')}}">{{ __('Manage Courses') }}</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin-course-curriculam',$data->id)}}">{{ __('Set Curriculam') }}</a></li>
    </ol>
    </div>
</div>


@include('includes.form-success')

<div class="row justify-content-center" id="curriculam">


    <div class="col-xl-12 mb-4 text-center mt-3">
        <a href="javascript::void(0)" data-toggle="modal" data-target="#sectionModalAdd" class="btn btn-outline-primary btn-rounded btn-sm ml-1"><i class="fas fa-plus"></i> {{ __('Add Section') }}</a>
        <a href="javascript::void(0)" data-toggle="modal" data-target="#lessonModalAdd" class="btn btn-outline-primary btn-rounded btn-sm ml-1"><i class="fas fa-plus"></i> {{ __('Add Lesson') }}</a>
        <a href="javascript::void(0)" data-toggle="modal" data-target="#quizModalAdd" class="btn btn-outline-primary btn-rounded btn-sm ml-1"><i class="fas fa-plus"></i> {{ __('Add Quiz') }}</a>
        <a href="javascript::void(0)" data-toggle="modal" data-target="#sectionSortModal" class="btn btn-outline-primary btn-rounded btn-sm ml-1"><i class="fas fa-sort"></i> {{ __('Sort Sections') }}</a>
        @if($show_lesson)
            <a href="{{ route('admin-course-curriculam-lesson',$data->sections()->with('lessons')->first()->lessons()->oldest('pos')->first()->id) }}" target="_blank" class="btn btn-outline-primary btn-rounded btn-sm ml-1"><i class="fas fa-eye"></i> {{ __('View On Frontend') }}</a>
        @endif
    </div>

    <div class="col-xl-8">
        <div class="row">
            @foreach($data->sections()->oldest('pos')->get() as $section)

            <div class="col-xl-12">
                <div class="card light-background text-seconday mb-5">
                    <div class="card-body">
                        <h5 class="card-title"><span class="font-weight-light">{{ __('Section') }} {{ $section->pos }}</span> : {{ $section->title }}
                            <div class="row justify-content-center alignToTitle float-right d-none">
                                <button type="button" data-title="{{ __('Sort Lesson') }}" data-href="{{ route('admin-lesson-sort',$section->id) }}" class="btn btn-outline-secondary btn-rounded btn-sm mr-1 lesson-sort"><i class="fas fa-sort"></i> {{ __('Sort Lesson') }}</button>
                                <button type="button" class="btn btn-outline-secondary btn-rounded btn-sm ml-1 mr-1 section-edit" data-id="{{ $section->id }}" data-form="{{ route('admin-section-update',$data->id) }}" data-val="{{ $section->title }}"><i class="fas fa-edit"></i> {{ __('Edit Section') }}</button>
                                <button type="button" class="btn btn-outline-secondary btn-rounded btn-sm ml-1 mr-1" data-toggle="modal" data-target="#deleteSectionModal" data-href="{{ route('admin-section-delete',$section->id) }}"><i class="fas fa-trash"></i> {{ __('Delete Section') }}</button>
                            </div>
                        </h5>
                        <div class="clearfix"></div>
                        @foreach($section->lessons()->oldest('pos')->get() as $lesson)
                        <div class="col-md-12">
                            <!-- Portlet card -->
                            <div class="card secondary-text mb-2">
                                <div class="card-body thinner-card-body">
                                    <div class="card-widgets d-none">
                                        @if($lesson->type == 'Quiz')
                                    <a href="javascript:;" class="quiz" data-href="{{ route('admin-lesson-quiz',$lesson->id) }}"><i class="fas fa-question-circle"></i></a>
                                        @endif
                                        <a href="javascript:;" class="lesson-edit" data-title="{{ $lesson->type == 'Lesson' ? __('Edit Lesson') : __('Edit Quiz') }}" data-href="{{ route('admin-lesson-edit',$lesson->id) }}"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:;" data-toggle="modal" data-target="#deleteLessonModal" data-href="{{ route('admin-lesson-delete',$lesson->id) }}"><i class="fas fa-trash"></i></a>
                                    </div>
                                    <h5 class="card-title mb-0">
                                        <span class="font-weight-light">
                                            @if($lesson->type == 'Lesson')
                                            <img src="{{ asset('assets/images/video.png') }}" alt="" height="16">
                                            @else
                                            <img src="{{ asset('assets/images/quiz.png') }}" alt="" height="16">
                                            @endif
                                            {{ __('Lesson') }} {{ $lesson->pos }}
                                        </span>: {{ $lesson->title }}
                                    </h5>
                                </div>
                            </div> <!-- end card-->
                        </div>
                        @endforeach
                    </div> <!-- end card-->
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>


@include('admin.course.includes.section.add')

@include('admin.course.includes.section.edit')

@include('admin.course.includes.section.delete')

@include('admin.course.includes.section.sort')

@include('admin.course.includes.lesson.lesson_add')

@include('admin.course.includes.lesson.quiz_add')

@include('admin.course.includes.lesson.edit')

@include('admin.course.includes.lesson.delete')

@include('admin.course.includes.lesson.sort')

@include('admin.course.includes.lesson.quiz_question')

@include('admin.course.includes.lesson.quiz_question_add')

@include('admin.course.includes.lesson.quiz_question_edit')

@include('admin.course.includes.lesson.question_delete')

@endsection

@section('scripts')

<script>

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
                window.location.href = "{{ route('admin-course-curriculam-status',$data->id) }}?text="+data;
            }

            $this.find('.submit-btn').prop('disabled',false);

         }

        });

  });

  // CURRICULAM FORM ENDS

// SORTING SECTION

var el = document.getElementById('section-list');
Sortable.create(el, {
  animation: 100,
  group: 'list-1',
  draggable: '.draggable-item',
  handle: '.draggable-item',
  sort: true,
  filter: '.sortable-disabled',
  chosenClass: 'active'
});

// SORTING SECTION ENDS

$('.confirm-modal-curriculam').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });


$('.card.light-background .card-body').on('mouseover',function(){

    $(this).find('.alignToTitle').removeClass('d-none');

});

$('.card.light-background .card-body').on('mouseout',function(){

    $(this).find('.alignToTitle').addClass('d-none');

});

$('.secondary-text .thinner-card-body').on('mouseover',function(){

$(this).find('.card-widgets').removeClass('d-none');

});

$('.secondary-text .thinner-card-body').on('mouseout',function(){

$(this).find('.card-widgets').addClass('d-none');

});

$('.section-edit').on('click',function(){
    var $this = $(this);
    $('#sectionModalEdit').modal('show');
    $('#editSectionForm').attr('action',$this.data('form'));
    $('#editSectionTitle').val($this.data('val'));
    $('#section_id').val($this.data('id'));

});

// EDIT OPERATION

$(document).on('click','.lesson-edit',function(){

if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
$('#lessonModalEdit').find('.modal-title').html($(this).data('title'));
  $('#lessonModalEdit .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }

            // TIME PICKER

            $('#duration-l').timepicker({
                    timeFormat: 'HH:mm:ss',
                    interval: 15
                });

            // TIME PICKER ENDS


      }
    });
    $('#lessonModalEdit').modal('show');
});

// EDIT OPERATION END


// QUIZ OPERATION

$(document).on('click','.quiz',function(){

if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
$('#quizQuestion').find('.modal-title').html($(this).data('title'));
  $('#quizQuestion .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }
    });
    $('#quizQuestion').modal('show');
});

// QUIZ OPERATION END


// LESSON SORT OPERATION

$(document).on('click','.lesson-sort',function(){

if(admin_loader == 1)
{
  $('.submit-loader').show();
}
$('#lessonSortModal').find('.modal-title').html($(this).data('title'));
  $('#lessonSortModal .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }


      }
    });
    $('#lessonSortModal').modal('show');
});

// LESSON SORT OPERATION END

// VIDEO TYPE

$(document).on('change','.video_file',function(){
    var val = $(this).val();
    if(val == 'file'){
        $('.file_show').html(''+
        '<div class="form-group">'+
            '<label>{{ __("File") }} *</label>'+
                '<div class="input-group">'+
                    '<div class="custom-file">'+
                        '<input type="file" class="custom-file-input" id="file" name="file">'+
                            '<label class="custom-file-label" for="file">{{ __("Select File") }}</label>'+
                    '</div>'+
                '</div>'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="duration">{{ __("Duration") }} *</label>'+
            '<input type="text" class="form-control"  name="duration" id="duration" value="00:00:00" required="">'+
        '</div>'
        );
    }else if(val == 'youtube'){
        $('.file_show').html(''+

        @if($gs->is_youtube_api == 1)

        '<div class="form-group">'+
            '<label for="link">{{ __("Search Video") }} *</label>'+
            '<div class="input-group">'+
                '<input type="text" class="form-control" placeholder="{{ __("Search Youtube Video") }}" class="ysearch" autocomplete="off">'+
                '<div class="input-group-append">'+
                    '<button type="button" class="btn btn-secondary btn-sm pull-right ysearch-btn">'+
                        '<i class="fa fa-check"></i>'+
                    '</button>'+
                '</div>'+
            '</div>'+
            '<div class="autocomplete">'+
				'<div id="myInputautocomplete-list" class="autocomplete-items"></div>'+
			'</div>'+
        '</div>'+

        @endif

        '<div class="form-group">'+
            '<label for="link">{{ __("Link") }} *</label>'+
            '<input class="form-control" type="text" name="url"  id="link"  placeholder="eg. https://www.youtube.com/watch?v=aFIsyEfXDIw">'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="duration">{{ __("Duration") }} *</label>'+
            '<input type="text" class="form-control"  name="duration" id="duration" value="00:00:00" required="">'+
        '</div>'
        );
    }else if(val == 'vimeo'){
        $('.file_show').html(''+
        '<div class="form-group">'+
            '<label for="link">{{ __("Link") }} *</label>'+
            '<input class="form-control" type="text" name="url"  id="link"  placeholder="eg. https://vimeo.com/403146037">'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="duration">{{ __("Duration") }} *</label>'+
            '<input type="text" class="form-control"  name="duration" id="duration" value="00:00:00" required="">'+
        '</div>'
        );
    }else if(val == 'url'){
        $('.file_show').html(''+
        '<div class="form-group">'+
            '<label for="link">{{ __("Link") }} *</label>'+
            '<input class="form-control" type="text" name="url"  id="link"  placeholder="{{ __("Enter Link") }}">'+
        '</div>'+
        '<div class="form-group">'+
            '<label for="duration">{{ __("Duration") }} *</label>'+
            '<input type="text" class="form-control"  name="duration" id="duration" value="00:00:00" required="">'+
        '</div>'
        );
    }else if(val == 'document'){
        $('.file_show').html(''+
        '<div class="form-group">'+
            '<label>{{ __("Attachment") }} <small>({{ __("Must be type of .pdf, .txt") }})</small></label>'+
                '<div class="input-group">'+
                    '<div class="custom-file">'+
                        '<input type="file" class="custom-file-input" id="file" name="file">'+
                            '<label class="custom-file-label" for="file">{{ __("Select File") }}</label>'+
                    '</div>'+
                '</div>'+
        '</div>'
        );
    }else if(val == 'image'){
        $('.file_show').html(''+
        '<div class="form-group">'+
            '<label>{{ __("Image File") }} <small>({{ __("Must be type of .jpg, .jpeg, .png") }})</small></label>'+
                '<div class="input-group">'+
                    '<div class="custom-file">'+
                        '<input type="file" class="custom-file-input" id="file" name="file">'+
                            '<label class="custom-file-label" for="file">{{ __("Select File") }}</label>'+
                    '</div>'+
                '</div>'+
        '</div>'
        );
    }

    else {
        $('.file_show').html(''+
        '<div class="form-group">'+
            '<label for="iframe">{{ __("Iframe Embed Code") }} *</label>'+
            '<textarea class="form-control" name="iframe_code" required="" placeholder="{{ __("Enter Iframe Embed Code") }}"></textarea>'+
        '</div>'
        );
    }


	// TIME PICKER

    $('#duration').timepicker({
            timeFormat: 'HH:mm:ss',
            interval: 15
        });

	// TIME PICKER ENDS

});

// VIDEO TYPE END

	// TIME PICKER

    $('#duration').timepicker({
            timeFormat: 'HH:mm:ss',
            interval: 15
        });

	// TIME PICKER ENDS

$(document).on('click','.add_question',function(){

    $('#quizQuestion').modal('hide');
    $('#quizQuestionAdd').modal('show');
    $('#quiz_lesson_id').val($(this).data('id'));

});

$(document).on('click','.question-edit',function(){

$('#quizQuestion').modal('hide');

if(admin_loader == 1)
  {
  $('.submit-loader').show();
}
  $('#quizQuestionEdit .modal-content .modal-body').html('').load($(this).attr('data-href'),function(response, status, xhr){
      if(status == "success")
      {
        if(admin_loader == 1)
          {
            $('.submit-loader').hide();
          }
      }
    });
    $('#quizQuestionEdit').modal('show');



});


$(document).on('click','#option-check',function(){

    var val = $(this).parent().prev().val();
    var option_dom = $(this).parent().parent().parent().next();
    var options = '';
    for(var i = 1; i <= val; i++){
        options += '<div class="form-group">';
        options += '<label>'+'{{ __("Option") }}'+' '+i+'</label>';
        options += '<div class="input-group">';
        options += '<input type="text" class="form-control" name="options[]" placeholder="'+'{{ __("Option") }}'+' '+i+'" required="">';
        options += '<span class="input-group-text">';
        options += '<input type="hidden" name="answers[]" value="0">';
        options += '<input type="checkbox" class="answer_check">';
        options += '</span>';
        options += '</div>';
        options += '</div>';
        options += '</div>';
    }
    if(val != '' || val != 0){

        option_dom.html(options)

    }

});

$(document).on('change','.answer_check',function(){

if(this.checked){

    $(this).prev().val('1');

}else{

    $(this).prev().val('0');

}

});

$(document).on('click','.ysearch-btn',function(){

  var search = encodeURIComponent($(this).parent().prev().val());
   if(search == ""){
     $(".autocomplete").hide();
   }
   else{
     $(".autocomplete").show();
     $(this).parent().parent().next().find('.autocomplete-items').load(mainurl+'/youtube/search/'+search);

   }

});

$(document).on('click','.docname',function(){
    var link = $(this).find('.link').val();
    $(this).parent().parent().parent().next().find('#link').val(link);
    $('.autocomplete').hide();
});


</script>

@endsection
