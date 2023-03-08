@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-4">
            <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h2><strong>Medium</strong> Edit </h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('medium.update', $medium->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group form-float">
                            <label>Medium</label>
                            <input type="text" class="form-control" placeholder="Medium" id="name" name="name" title="Please enter medium" value="{{ $medium->name }}">
                            @if ($errors->has('name'))
                            <span id="title_error" style="color: red">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group form-float">
                            <label>Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" selected disabled>--select category--</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $medium->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <span id="slug_error" style="color: red">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

<script>

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



</script>
@endsection