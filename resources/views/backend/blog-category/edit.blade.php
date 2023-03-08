@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit BlogCategory</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body mt-3">

                            <form role="form" action="{{ route('blog-category.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="mt-2">Category Name</label>
                                    <input class="form-control" name="name"  id="name"
                                        value="{!! $blog->name !!}">
                                    @if ($errors->has('name'))
                                        <span style="color: red">{{ $errors->first('name') }}</span>
                                    @else
                                       
                                    @endif

                                </div>

                                   
                                <button type="submit" class="btn btn-default">Save</button>
                            </form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
