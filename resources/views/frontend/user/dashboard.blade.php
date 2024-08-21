@extends('layouts.frontEndMaster')

@section('body_content')

<section class="movie-section section--bg pb-60 pt-80 section" data-section="latest_series">
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
                    <h2 class="section-title">User Dashboard</h2>
                </div>
            </div>
        </div>
        {{-- <div class="row justify-content-center mb-30-none ">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="profile-section">
                 <div class="row">
                   <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                   <div class="img-profile">
                       <img src="{{ asset(Auth::user()->image) }}" class="img-rounded user-image" alt="profile_img" title="profile pic">
                   </div>
                   <div class="profile_title_item">
                     <h5>{{ Auth::user()->name }}</h5>
                     <p>{{ Auth::user()->email }}</p>
                   </div>
                   </div>
                   <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                   <div class="row">
                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                       <div class="member-ship-option">
                       <h5 class="color-up">My Subscription</h5>
                            <div class="mt-3"><a href="http://localhost/movie_download/membership_plan" class="vfx-item-btn-danger text-uppercase">Select Plan</a></div>
                       </div>

                     </div>
                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                       <div class="member-ship-option">
                       <h5 class="color-up">Balance</h5>
                       <span class="premuim-memplan-bold-text"><strong>Date:</strong>
                                       </span>
                       <span class="premuim-memplan-bold-text"><strong>Plan:</strong>
                                       </span>
                       <span class="premuim-memplan-bold-text"><strong>Amount:</strong>
                                       </span>

                       </div>
                     </div>
                   </div>
                   </div>
                 </div>
                </div>
              </div>

        </div> --}}

        <div class="row">
            <!-- Sidebar Section -->
            <div class="col-md-3">
                <div class="sidebar">
                    <h4>Carla Bird</h4>
                    <p>vibaxuk@mailinator.com</p>
                    <button class="btn">Dashboard</button>
                    <button class="btn">Wishlist</button>
                    <button class="btn">Payment History</button>
                    <button class="btn">Package History</button>
                    <button class="btn">Edit Profile</button>
                    <button class="btn">Logout</button>
                </div>
            </div>

            <!-- Content Section -->
            <div class="col-md-9">
                <!-- My Subscription Card -->
                <div class="card-pattern">
                    <h5 class="section-title">My Subscription</h5>
                    <button class="select-plan-btn mt-3 w-100">SELECT PLAN</button>
                </div>

                <!-- Last Invoice Card -->
                <div class="card-pattern">
                    <h5 class="section-title">Last Invoice</h5>
                    <p>Date:</p>
                    <p>Plan:</p>
                    <p>Amount:</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
