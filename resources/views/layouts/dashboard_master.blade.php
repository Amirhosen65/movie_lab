
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $pageTitle ?? ' ' }} | AJ Movies</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
      rel="icon"
      href="{{ asset('backend_asset') }}/img/kaiadmin/favicon.ico"
      type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{ asset('backend_asset') }}/js/plugin/webfont/webfont.min.js"></script>

    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('backend_asset') }}/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/css/plugins.min.css" />
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="{{ asset('backend_asset/css/style.css') }}">

  </head>
  <body>
    <div class="wrapper">

        @include('dashboard.partials.sidebar')

      <div class="main-panel">

        @include('dashboard.partials.menubar')

        @yield('content')

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('backend_asset') }}/js/core/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('backend_asset') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('backend_asset') }}/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backend_asset') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="{{ asset('backend_asset') }}/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('backend_asset') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('backend_asset') }}/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend_asset') }}/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('backend_asset') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('backend_asset') }}/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="{{ asset('backend_asset') }}/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('backend_asset') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend_asset') }}/js/kaiadmin.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>

    @yield('footer_script')

    {{-- alert message --}}
    @if (session('success'))
    <script>
        swal("Success!", "{{ session('success') }}", {
            icon: "success",
            buttons: {
            confirm: {
                className: "btn btn-success d-none",
            },
            },
            timer: 1500
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        swal("Opps!", "{{ session('error') }}", {
            icon: "warning",
            buttons: {
            confirm: {
                className: "btn btn-warning",
            },
            },

        });
    </script>
    @endif

  </body>
</html>
