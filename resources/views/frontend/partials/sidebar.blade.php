@php
    $popularMovie = App\Models\Movie::where('status',true)->orderBy('visitor','desc')->take(5)->get();
@endphp

<div class="col-md-4">
    <!-- Ads Section -->
    <div class="ads-section text-center mb-4">
        <div class="row">
            <div class="contaner text-center">
                <script type="text/javascript">
                    atOptions = {
                        'key' : 'c14af478439df51c289a9afd377654f2',
                        'format' : 'iframe',
                        'height' : 250,
                        'width' : 300,
                        'params' : {}
                    };
                </script>
                <script type="text/javascript" src="//headacheaim.com/c14af478439df51c289a9afd377654f2/invoke.js"></script>
            </div>
        </div>
    </div>

    <!-- Latest Updates -->
    <h3>Most Popular</h3>

    @forelse ($popularMovie as $movie)
        <div class="side-item d-flex align-items-start">
            <a href="{{ route('movie.details', $movie->slug) }}">
                <img src="{{ asset($movie->image) }}" alt="Movie Image">
            </a>
            <div class="ms-3">
                <a class="two-clamp" href="{{ route('movie.details', $movie->slug) }}">
                    <h5>{{ $movie->title }}</h5>
                </a>
                <p ><i class="lar la-star text--warning"></i> {{ $movie->rating }} | {{ $movie->release_date }}</p>
                <p>{{ $movie->RelationCategory->name }}</p>
            </div>
        </div>
    @empty
        <div>Not Found</div>
    @endforelse
        <div class="text-center">
            <script type="text/javascript">
                atOptions = {
                    'key' : 'd20e97997cd23a123b8ab203138d49ab',
                    'format' : 'iframe',
                    'height' : 300,
                    'width' : 160,
                    'params' : {}
                };
            </script>
            <script type="text/javascript" src="//headacheaim.com/d20e97997cd23a123b8ab203138d49ab/invoke.js"></script>
        </div>
</div>
