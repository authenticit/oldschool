
<div class="text-center">
    <img src="{{asset('assets/images/users/'.$data->image)}}" class="applicationimage" width="150" alt="...">
  </div>
<table class="table table-bordered">
    <tbody>
      <tr>
        <th>{{__('Applicant')}}</th>
        <td>{{$data->name}}</td>
      </tr>
      <tr>
        <th>{{('Email')}}</th>
        <td>{{$data->email}}</td>
      </tr>
      <tr>
        <th>{{__('Phone number')}}</th>
        <td>{{$data->phone}}</td>
      </tr>
      <tr>
        <th>{{__('Address')}}</th>
        <td>{{$data->address}}</td>
      </tr>
      @if($data->message)
      <tr>
        <th>{{__('Message')}}</th>
        <td>{{$data->message}}</td>
      </tr>
      @endif
      <tr>
        <th>{{__('Status')}}</th>
        <td>
            @if($data->status == 0)
            <span class="badge p-2 badge-danger">{{__('Pending')}}</span>
            @else
            <span class="badge p-2 badge-success">{{__('Approve')}}</span>
            @endif
        </td>
      </tr>
    </tbody>
  </table>