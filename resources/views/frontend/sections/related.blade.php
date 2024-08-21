
<section class="movie-section section--bg pb-30 section" data-section="latest_series">
    <div class="container text-center">
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
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-header">
                    <h2 class="section-title">Related Movies</h2>

                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none ">
            @forelse ($relatedMovies as $movie)
                <div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 col-xl-2 col-4 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb mb-3">
                            <img src="{{ asset($movie->image) }}" alt="movie">
                            @if ($movie->version == 1)
                            <span class="movie-badge">Premium</span>
                            @endif
                            <div class="movie-thumb-overlay">
                                <a class="video-icon" href="{{ route('movie.details', $movie->slug) }}"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <!-- Movie Title -->
                        <a href="{{ route('movie.details', $movie->slug) }}">
                            <h4 class="movie-title two-clamp">{{ $movie->title }}</h4>
                        </a>
                    </div>
                </div>
            @empty
                <p>No movies available.</p>
            @endforelse
        </div>
    </div>
</section>
