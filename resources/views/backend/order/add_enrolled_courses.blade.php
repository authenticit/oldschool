@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h2><strong>Enrolled Course</strong> Create </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.enroll.course') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group form-float">
                                <label for="name">User id</label>
                                <input type="number" class="form-control" placeholder="input user id" id="name"
                                    name="user_id">
                                @if ($errors->has('user_id'))
                                    <span id="title_error" style="color: red">{{ $errors->first('user_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="course_id">Course id</label>
                                <input type="number" class="form-control" placeholder="input course id" id="course_id"
                                    name="course_id">
                                @if ($errors->has('course_id'))
                                    <span id="title_error" style="color: red">{{ $errors->first('course_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="order_id">Order id</label>
                                <input type="number" class="form-control" placeholder="input order id" id="order_id"
                                    name="order_id">
                                @if ($errors->has('order_id'))
                                    <span id="title_error" style="color: red">{{ $errors->first('order_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-float">
                                <label for="status">Status</label>
                                <input type="number" class="form-control" placeholder="input 0 or 1" id="status"
                                    name="status">
                                @if ($errors->has('status'))
                                    <span id="title_error" style="color: red">{{ $errors->first('status') }}</span>
                                @endif
                            </div>


                            <button type="submit" name="action_button" id="action_button"
                                class="btn btn-primary waves-effect">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

