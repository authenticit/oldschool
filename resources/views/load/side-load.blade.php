<div class="rating-left-area">
    <span class="rating-number">{{ App\Models\Rating::normalRating($course->id) }}</span>

    <div class="stars">
        <div class="ratings">
            <div class="empty-stars"></div>
            <div class="full-stars" style="width:{{ App\Models\Rating::ratings($course->id) }}%"></div>
          </div>
    </div>

    <span class="text">{{ __('Course Rating') }}</span>
  </div>
  <div class="rating-right-area">
    <div class="rating-progress-bar">
      <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ App\Models\Rating::customRatings($course->id,5) }}%" aria-valuenow="{{ App\Models\Rating::customRatings($course->id,5) }}" aria-valuemin="0" aria-valuemax="100">{{ App\Models\Rating::customRatings($course->id,5) }}%</div>
      </div>
      <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ App\Models\Rating::customRatings($course->id,4) }}%" aria-valuenow="{{ App\Models\Rating::customRatings($course->id,4) }}" aria-valuemin="0" aria-valuemax="100">{{ App\Models\Rating::customRatings($course->id,4) }}%</div>
      </div>
      <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ App\Models\Rating::customRatings($course->id,3) }}%" aria-valuenow="{{ App\Models\Rating::customRatings($course->id,3) }}" aria-valuemin="0" aria-valuemax="100">{{ App\Models\Rating::customRatings($course->id,3) }}%</div>
      </div>
      <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ App\Models\Rating::customRatings($course->id,2) }}%" aria-valuenow="{{ App\Models\Rating::customRatings($course->id,2) }}" aria-valuemin="0" aria-valuemax="100">{{ App\Models\Rating::customRatings($course->id,2) }}%</div>
      </div>
      <div class="progress">
        <div class="progress-bar bg-info" role="progressbar" style="width: {{ App\Models\Rating::customRatings($course->id,1) }}%" aria-valuenow="{{ App\Models\Rating::customRatings($course->id,1) }}" aria-valuemin="0" aria-valuemax="100">{{ App\Models\Rating::customRatings($course->id,1) }}%</div>
      </div>
    </div>
  </div>
