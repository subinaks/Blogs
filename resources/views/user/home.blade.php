 @extends('user/app')
 <!-- Main Content-->
 @section('main')
 <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            @if(isset($posts))
            @foreach($posts as $post)
            <div class="post-preview">
                <a href="{{ route('show-post', ['slug' => $post->slug]) }}">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{ $post->getUser->name }}</a>
                    on {{ $post->created_at->format('F j, Y') }}
                </p>
            </div>
   
            <hr class="my-4" />
        
            @endforeach

            @else
            No Post Available
            @endif

       
            <!-- Pager-->
            {!! $posts->links() !!}
        </div>
    </div>
</div>
@endsection