@extends('layouts.frontEndMaster')

@section('body_content')


<section class="section--bg pt-80">

    <div class="container mt-4">
        <div class="row">
            <!-- Main Content -->
            <div class="col-md-8">
                <div class="container text-center pb-2">
                    <script type="text/javascript">
                        atOptions = {
                            'key' : '7dd557336a58f6a9f8c8ae558721a819',
                            'format' : 'iframe',
                            'height' : 90,
                            'width' : 728,
                            'params' : {}
                        };
                    </script>
                    <script type="text/javascript" src="//headacheaim.com/7dd557336a58f6a9f8c8ae558721a819/invoke.js"></script>
                </div>
                <!-- Search Bar -->
                @if (isset($keyword))
                    <div class="result-item mb-2">
                        <h5>Results found: <span>{{ $keyword }}</span></h5>
                        <div>
                            <form class="list-search" action="{{ route('search') }}" method="GET">
                                <input name="keword" type="search" value="{{ $keyword }}" placeholder="Search here..." id="search">
                                <button class="header-search-btn" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Search Results -->
                @forelse ($movies as $movie)
                    <div class="result-item d-flex align-items-start">
                        <img src="{{ asset($movie->image) }}" alt="Movie Image">
                        <div class="ms-3">
                            <a class="one-clamp" href="{{ route('movie.details', $movie->slug) }}">
                                <h5>{{ $movie->title }}</h5>
                            </a>
                            <p class="two-clamp short-desc">{{ $movie->short_desc }}</p>
                            <span class="sub-title">
                                <span class="cat">{{ $movie->RelationCategory->name }} | <i class="lar la-star text--warning"></i> {{ $movie->rating }} | {{ $movie->release_date }}</span>
                            </span>

                        </div>
                    </div>
                @empty
                <div class="col-12 col-md-8 col-lg-8 ps-md-5 mb-30">
                    <img src="{{ asset('uploads/default/no-results.png') }}" alt="No Result">
                </div>
                @endforelse

            </div>

            <!-- Sidebar -->
            @include('frontend.partials.sidebar')
        </div>
    </div>

</section>

@endsection
