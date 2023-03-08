@foreach ($course->ratings as $rating)
<div class="user-single-review">
<div class="review-left">
    <img src="{{ $rating->user->photo ? asset('assets/images/users/'.$rating->user->photo) : asset('assets/images/placeholder.jpg') }}" alt="">
    <h6 class="name">{{ $rating->user->showName() }}</h6>
    <span class="time">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$rating->review_date)->diffForHumans() }}</span>
</div>
<div class="review-right">
    <div class="stars">
    @for ($i = 1; $i <= $rating->rating; $i++)
        <i class="fas fa-star"></i>
    @endfor
    </div>
    <p class="review-content">
    {{$rating->review}}
    </p>
</div>
</div>
@endforeach
