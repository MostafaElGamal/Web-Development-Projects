@extends('layouts.blog')

@section('title')
  Laravel Blog
@endsection


@section('header')
<!-- Header -->
<header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #FDFFFC -1.5%, #2EC4B6 45%, #E71D36 100%);">
  <div class="container">

    <div class="row">
      <div class="col-md-8 mx-auto">

        <h1>Welcome To Laravel Blog</h1>
        <p class="lead-2 opacity-90 mt-6">Read and get updated on how we progress</p>

      </div>
    </div>

  </div>
</header><!-- /.header -->
@endsection

@section('content')
<!-- Main Content -->
<main class="main-content">
  <div class="section bg-gray">
    <div class="container">
      <div class="row">


        <div class="col-md-8 col-xl-9">
          <div class="row gap-y">

            @forelse($posts as $post)

          <div class="col-md-6">
            <div class="card border hover-shadow-6 mb-6 d-block">
              <a href="{{route('blog.show', $post->id )}}"><img class="card-img-top" src="http://127.0.0.1:8000/storage/{{ $post->image }}" alt="Card image cap"></a>
              <div class="p-6 text-center">
                <p>
                  <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="">{{ $post->category-> name }}
                  </a>
                </p>
                <h5 class="mb-0"><a class="text-dark" href="{{route('blog.show', $post->id )}}">
                {{ $post->title }}</a></h5>
              </div>
            </div>
          </div>

          @empty
          <p>No Resulst found for qauery <strong>{{ request()->query('search') }}</strong> </p>
          @endforelse
          </div>

          {{ $posts->appends( ['search'=>request()->query('search')] )->links() }}
        </div>



          @include('partials.sidebar')
        </div>

      </div>
    </div>
  </div>
</main>
@endsection
