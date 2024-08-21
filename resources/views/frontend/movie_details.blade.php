@extends('layouts.frontEndMaster')

@push('style-lib')
    <link href="{{ asset('frontend_assets/basic/css/video-js.css') }}" rel="stylesheet">
@endpush
@push('style')
    {{-- @if ($watch)
    @endif --}}
        <style>
            .video-show {
                display: block;
            }

            .video-hide {
                display: none;
            }
        </style>
@endpush

@push('script-lib')
    <script src="{{ asset('frontend_assets/basic/js/video.min.js') }}"></script>
    <!-- Include the YouTube plugin -->
<script src="https://cdn.jsdelivr.net/npm/videojs-youtube@3.0.0/dist/Youtube.min.js"></script>
@endpush

@section('body_content')

@php
$downloadLinks = json_decode($movie->download_links, true);
@endphp

<section class="movie-details-section section--bg ptb-30">
    <div class="container">
        <div class="row mb-20-none">
            <div class="col-xl-8 col-lg-8 mb-20 mt-40">
                <div class="movie-item">
                    <div class="video-show movie-video " id="video_container">
                        <div class="video-show movie-video" id="video_container">
                            <video id="my-video" class="video-js vjs-default-skin" controls preload="auto" height="264"
                                   poster="{{ asset($movie->banner) }}"
                                   data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "{{ $movie->trailer }}" }], "playbackRates": [0.5, 1, 1.5, 2] }'>
                            </video>
                        </div>
                    </div>

                    <div class="movie-content">
                        <div class="movie-content-inner d-sm-flex justify-content-between align-items-center flex-wrap">
                            <div class="movie-content-left">
                                <h3 class="title">{{ $movie->title }}</h3>
                                <span class="sub-title">Category : <span class="cat">{{ $movie->RelationCategory->name }}</span>
                                @forelse ($movie->MovieRelationTags as $tag)
                                    <a href="#">{{ $tag->name }}</a>,
                                @empty
                                    Not Fund
                                @endforelse
                                </span>
                            </div>
                            <div class="movie-content-right d-flex justify-content-between">
                                <div class="movie-widget-area align-items-center">
                                    <span class="movie-widget"><i class="lar la-star text--warning"></i> {{ $movie->rating }}</span>
                                    <span class="movie-widget"><i class="lar la-eye text--danger"></i> {{ $movie->visitor }} views</span>
                                    <span class="movie-widget addWishlist " title="Wishlist"><i class="las la-plus-circle"></i></span>
                                    <span class="movie-widget removeWishlist d-none"><i class="las la-minus-circle"></i></span>
                                </div>

                                {{-- <div class="align-items-center justify-content-sm-end ps-5">
                                    <ul class=" d-flex align-items-center justify-content-sm-end flex-wrap">
                                        <li class="caption">Share : </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FPlaylab%2Fwatch-video%2F1"><i class="lab la-facebook-f"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin">
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Flocalhost%2FPlaylab%2Fwatch-video%2F1&amp;title=Master&amp;summary=Master"><i class="lab la-linkedin-in"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter">
                                            <a href="https://twitter.com/intent/tweet?text=Master%0Ahttp://localhost/Playlab/watch-video/1"><i class="lab la-twitter"></i></a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Pinterest">
                                            <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Flocalhost%2FPlaylab%2Fwatch-video%2F1&description=Master&media=http://localhost/Playlab/assets/images/item/landscape//2024/01/31/65ba5e07117101706712583.jpg"><i class="lab la-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div> --}}

                            </div>
                        </div>
                        <p class="movie-widget__desc">{{ $movie->short_desc }}</p>

                    </div>
                </div>

                <div class="container mt-10">
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

                <div class="product-tab mt-40">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-bs-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-team" data-bs-toggle="tab" href="#product-team-content" role="tab" aria-controls="product-team-content" aria-selected="false">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-download" data-bs-toggle="tab" href="#download-content" role="tab" aria-controls="download-content" aria-selected="false">Download Links</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="product-desc-content mb-2">
                                {!! html_entity_decode($movie->description) !!}
                            </div>

                            <div class="download-buttons">
                                <h3>Download Links</h3>
                                @if(!empty($downloadLinks))
                                    @foreach($downloadLinks as $link)
                                        <a class="btn--base btn-download" target="_blank" href="{{ $link['link'] }}">
                                            <i class="las la-download la-lg"></i> {{ $link['title'] }}
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="product-team-content" role="tabpanel" aria-labelledby="product-tab-team">
                            <div class="product-desc-content">
                                <ul class="team-list">
                                    <li><span>Director:</span> {{ $movie->director }}</li>
                                    @if (!empty($movie->casts))
                                    <li><span>Cast:</span> {{ $movie->casts }}</li>
                                    @endif
                                    <li><span>Genres:</span> {{ $movie->RelationGenre->name }}</li>
                                    <li><span>Language:</span> {{ $movie->RelationLanguage->name }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="download-content" role="tabpanel" aria-labelledby="product-tab-download">
                            <div class="download">
                                <div class="download-buttons mt-3">
                                    @if(!empty($downloadLinks))
                                        @foreach($downloadLinks as $link)
                                            <a class="btn--base btn-download" href="{{ $link['link'] }}">
                                                <i class="las la-download la-lg"></i> {{ $link['title'] }}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- <div class="col-xl-4 col-lg-4 mb-20 mt-40">
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
                <div class="row pt-3">
                    <div class="col-xl-12">
                        <div class="section-header">
                            <h2 class="section-title">Most Popular</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mb-20-none">
                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6 col-xs-6 mb-2">
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
                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6 col-xs-6 mb-2">
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
                    <div class="col-xl-6 col-lg-6 col-md-4 col-sm-6 col-xs-6 mb-2">
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
            </div> --}}
            @include('frontend.partials.sidebar')
        </div>
    </div>
</section>

{{-- <section class="section--bg">
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
</section> --}}

@include('frontend.sections.related')

@endsection
