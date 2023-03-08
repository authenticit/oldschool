<h6 class="dropdown-header">
    {{__('All Notification')}}
    @if (App\Models\UserNotification::where('register_id',0)->where('user_id',Auth::user()->id)->count() != 0)
        <a href="javascript:;" data-href="{{route('instructor.delete.clear')}}" class="text-white float-right" id="clear-notf">{{__('Clear')}}</a>
    @endif
  </h6>

  @if (App\Models\UserNotification::where('register_id',0)->where('user_id',Auth::user()->id)->count()==0)
    <a class="dropdown-item text-center small text-gray-500" href="#">{{__('Empty Notifications!')}}</a>
  @else 
      @foreach (App\Models\UserNotification::where('register_id',0)->where('user_id',Auth::user()->id)->orderBy('id','desc')->get() as $noty)

          <a class="dropdown-item d-flex align-items-center" href="{{route('instructor.purchase.details',$noty->order_number)}}">
            <div class="mr-3">
              <div class="icon-circle bg-info">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">{{Carbon\Carbon::parse($noty->created_at)->diffForHumans()}}</div>
              <span class="font-weight-bold">{{__('A Course Ordered')}}</span>
            </div>
          </a>

      @endforeach
  @endif