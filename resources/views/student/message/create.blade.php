@extends('layouts.front')

@section('title')
Message
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('assets/front/css/student.css')}}">
@endsection
@section('content')
<section class="user-dashboard">
    <div class="user-dashboard-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading-title">
                        {{__('Message Details')}}
                    </h4>
                    @include('student.includes.nav')
                </div>
            </div>
        </div>
    </div>
    <div class="user-dashboard-content-area">
       <div class="user-profile-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <main>
                        <div class="content">
                            <div class="order-table-wrap support-ticket-wrapper ">
                                <div class="panel panel-primary">
                                <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
                                @include('includes.admin.form-both')
                                    <div class="panel-body" id="messages">

                                        @foreach($conv->messages as $message)
                                        @if($message->sent_user != null)

                                        <div class="single-reply-area admin">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="reply-area">
                                                        <div class="left">
                                                            @if($message->conversation->sent->is_provider == 1 )
                                                            <img class="img-circle" src="{{ $message->conversation->sent->photo != null ? $message->conversation->sent->photo : asset('assets/images/noimage.png') }}" alt="">
                                                            @else
                                                            <img class="img-circle" src="{{ $message->conversation->sent->photo != null ? asset('assets/images/users/'.$message->conversation->sent->photo) : asset('assets/images/noimage.png') }}" alt="">
                                                            @endif
                                                            <p class="ticket-date">{{ $message->conversation->sent->first_name .  $message->conversation->sent->last_name}}</p>
                                                        </div>
                                                        <div class="right">
                                                            <p>{{ $message->message }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <br>
                                        @else

                                        <div class="single-reply-area user">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="reply-area">
                                                        <div class="left">
                                                            <p>{{ $message->message }}</p>
                                                        </div>
                                                        <div class="right">
                                                            @if($message->conversation->recieved->is_provider == 1 )
                                                            <img class="img-circle" src="{{ $message->conversation->recieved->photo != null ? $message->conversation->recieved->photo : asset('assets/images/noimage.png') }}" alt="">
                                                            @else
                                                            <img class="img-circle" src="{{ $message->conversation->recieved->photo != null ? asset('assets/images/users/'.$message->conversation->recieved->photo) : asset('assets/images/noimage.png') }}" alt="">
                                                            @endif
                                                            <p class="ticket-date">{{$message->conversation->recieved->frist_name . $message->conversation->recieved->last_name}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <br>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="panel-footer">
                                        <form id="messageform" data-href="{{ route('student-message-load',$conv->id) }}" action="{{route('student-message-post')}}" method="POST">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="hidden" name="conversation_id" value="{{$conv->id}}">
                                                @if($user->id == $conv->sent_user)
                                                <input type="hidden" name="sent_user" value="{{$conv->sent->id}}">
                                                <input type="hidden" name="reciever" value="{{$conv->recieved->id}}">
                                              @else
                                                <input type="hidden" name="reciever" value="{{$conv->sent->id}}">
                                                <input type="hidden" name="recieved_user" value="{{$conv->recieved->id}}">
                                            @endif

                                                <textarea class="form-control" name="message" id="wrong-invoice" rows="5" style="resize: vertical;" required="" placeholder="{{ __('Message') }}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success">
                                                    {{ __('Add Reply') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
       </div>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('assets/front/js/student.js')}}"></script>
@endsection
