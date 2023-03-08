

  <div class="row">



      @foreach ($blogs as $blog)

      <div class="col-md-6">
        <a href="{{route('front.blogshow',$blog->id)}}" class="single-blog">
          <div class="img">
            <img src="{{asset('assets/images/blogs/'.$blog->photo)}}" alt="blog-photo">
          </div>
          <div class="content">
            <span>
              <h4 class="title">
                {{$blog->title}}
              </h4>
            </span>
            <div class="text">
              <p>
                {{substr(strip_tags($blog->details),0,170)}}
              </p>
            </div>

            <ul class="top-meta">
              <li>
                <span>
                  <i class="far fa-clock"></i>{{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                </span>
              </li>

            </ul>
          </div>
        </a>
      </div>

      @endforeach

  </div>

  <div class="page-center">
    @if(isset($_GET['search']))
      {!! $blogs->appends(['search' => $_GET['search']])->links() !!}   
    @else
      {!! $blogs->links() !!}   
    @endif  
  </div>
