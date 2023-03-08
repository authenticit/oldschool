
<div class="text-center">
    <img src="{{ $instructor->photo ? asset('assets/images/users/'.$instructor->image) : asset('assets/images/placeholder.jpg')}}" class="applicationimage" width="150" alt="...">
  </div>
<table class="table table-bordered mt-3">
    <tbody>
      <tr>
        <th>{{__('Instructor')}}</th>
        <td>{{$instructor->name}}</td>
      </tr>
	<tr>
        <th>{{__('Instructor Email')}}</th>
        <td>{{$instructor->email}}</td>
      </tr>
	<tr>
        <th>{{__('Instructor Phone')}}</th>
        <td>{{$instructor->phone}}</td>
      </tr>
	<tr>
        <th>{{__('Instructor Address')}}</th>
        <td>{{$instructor->address}}</td>
      </tr>
	<tr>
        <th>{{__('Total Earning')}}</th>
 	  <td>{{$curr->sign}}{{round(\App\Models\InstructorOrder::instructorPrice($instructor->id) * $curr->value ,2) }}</td>

      </tr>
	<tr>
        <th>{{ __('Current Balance') }}</th>
        <td>{{$curr->sign}}{{ round((App\Models\User::findOrFail($instructor->id)->balance * $curr->value),2) }}</td>
      </tr>

	<tr>
        <th>{{ __('Total Affiliate') }}</th>
        <td>{{ App\Models\ReferralHistory::where('referrer_id',$instructor->id)->whereRegisterId(0)->whereType('Instructor')->count() }}</td>
      </tr>
      
    </tbody>
  </table>