<h6 class="dropdown-header">
    {{__('All Notification')}}
    @if (App\Models\Notification::where('register_id',0)->count() != 0)
        <a href="javascript:;" data-href="{{route('admin.delete.clear')}}" class="text-white float-right" id="clear-notf">{{__('Clear')}}</a>
    @endif
  </h6>

  @if (App\Models\Notification::where('register_id',0)->count()==0)
    <a class="dropdown-item text-center small text-gray-500" href="#">{{__('Empty Notifications!')}}</a>
  @else 
      @foreach (App\Models\Notification::orderBy('id','desc')->get() as $noty)
        @if ($noty->user_id)
          <a class="dropdown-item d-flex align-items-center" href="{{route('admin-student-edit',$noty->user_id)}}">
            <div class="mr-3">
              <div class="icon-circle bg-primary">
                <i class="fas fa-user-graduate"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">{{Carbon\Carbon::parse($noty->created_at)->diffForHumans()}}</div>
              <span class="font-weight-bold">{{__('A New Student Registered')}}</span>
            </div>
          </a>
        @endif
        @if ($noty->order_id)
          <a class="dropdown-item d-flex align-items-center" href="{{route('admin.purchase.details',$noty->order_id)}}">
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
        @endif
        @if ($noty->conversation_id)
          <a class="dropdown-item d-flex align-items-center" href="{{route('admin-conversation-details',$noty->conversation_id)}}">
            <div class="mr-3">
              <div class="icon-circle bg-info">
                <i class="fas fa-dollar-sign"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-500">{{Carbon\Carbon::parse($noty->created_at)->diffForHumans()}}</div>
              <span class="font-weight-bold">{{__('A New Message Added')}}</span>
            </div>
          </a>
        @endif
      @endforeach
  @endif