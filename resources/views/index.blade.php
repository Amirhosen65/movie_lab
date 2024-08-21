@extends('layouts.frontEndMaster')

@section('body_content')

<section class="movie-section section--bg pb-80 pt-80 section" data-section="latest_series">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-header">
                    <h2 class="section-title">Recently Added</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            @forelse ($movies as $movie)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb">
                            <img src="{{ asset($movie->image) }}" alt="movie">
                            <span class="movie-badge">Free</span>
                            <div class="movie-thumb-overlay">
                                <a class="video-icon" href="{{ route('movie.details', $movie->slug) }}"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb">
                            <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5ed06eb6b1706712784.jpg" alt="movie">
                                                            <span class="movie-badge">Free</span>
                                                        <div class="movie-thumb-overlay">
                                <a class="video-icon" href="http://localhost/Playlab/watch-video/2"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb">
                            <img src="http://localhost/Playlab/assets/images/item/portrait//2024/07/02/66843a039cb951719941635.png" alt="movie">
                                                            <span class="movie-badge">Free</span>
                                                        <div class="movie-thumb-overlay">
                                <a class="video-icon" href="http://localhost/Playlab/watch-video/3"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="movie-section section--bg pb-80 section" data-section="latest_series">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-header">
                    <h2 class="section-title">Recently Added</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb">
                            <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5e077fc6e1706712583.jpg" alt="movie">
                                                            <span class="movie-badge">Free</span>
                                                        <div class="movie-thumb-overlay">
                                <a class="video-icon" href="http://localhost/Playlab/watch-video/1"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb">
                            <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5ed06eb6b1706712784.jpg" alt="movie">
                                                            <span class="movie-badge">Free</span>
                                                        <div class="movie-thumb-overlay">
                                <a class="video-icon" href="http://localhost/Playlab/watch-video/2"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                    <div class="movie-item">
                        <div class="movie-thumb">
                            <img src="http://localhost/Playlab/assets/images/item/portrait//2024/07/02/66843a039cb951719941635.png" alt="movie">
                                                            <span class="movie-badge">Free</span>
                                                        <div class="movie-thumb-overlay">
                                <a class="video-icon" href="http://localhost/Playlab/watch-video/3"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
    </div>
</section>

<section class="movie-section section--bg pb-80 section" data-section="latest_series">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-header">
                    <h2 class="section-title">Recently Added</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                <div class="movie-item">
                    <div class="movie-thumb mb-2">
                        <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5e077fc6e1706712583.jpg" alt="movie">
                            <span class="movie-badge">Free</span>
                        <div class="movie-thumb-overlay">
                            <a class="video-icon" href="{{ route('movie.details', 1) }}"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>Movie Title</h4>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                <div class="movie-item">
                    <div class="movie-thumb mb-2">
                        <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5e077fc6e1706712583.jpg" alt="movie">
                            <span class="movie-badge">Free</span>
                        <div class="movie-thumb-overlay">
                            <a class="video-icon" href="http://localhost/Playlab/watch-video/1"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>Movie Title</h4>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                <div class="movie-item">
                    <div class="movie-thumb mb-2">
                        <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5e077fc6e1706712583.jpg" alt="movie">
                            <span class="movie-badge">Free</span>
                        <div class="movie-thumb-overlay">
                            <a class="video-icon" href="http://localhost/Playlab/watch-video/1"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>Movie Title</h4>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30">
                <div class="movie-item">
                    <div class="movie-thumb mb-2">
                        <img src="http://localhost/Playlab/assets/images/item/portrait//2024/01/31/65ba5e077fc6e1706712583.jpg" alt="movie">
                            <span class="movie-badge">Free</span>
                        <div class="movie-thumb-overlay">
                            <a class="video-icon" href="http://localhost/Playlab/watch-video/1"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h4>Movie Title</h4>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

