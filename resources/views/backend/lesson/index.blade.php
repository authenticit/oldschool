@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <!-- Exportable Table -->

        <div class="row clearfix">
        
    </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="exhibition_table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>Title</th>
                                            <th>Url</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lessons as $b)
                                            <tr>

                                                <td>{{ $b->title }}</td>
                                                <td>{{ $b->url }}</td>

                                                <td>
                                                    <a href="{{ route('lesson.edit', $b->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('lesson.destroy', $b->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this lesson?');">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
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
