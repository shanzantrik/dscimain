<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#03122b" />

  <meta name="author" content="DSCI">
  <meta name="keywords"
    content="Cyber Security Conference in India, technology conference, cyber attacks, data security, digital enterprise, cloud security, hardware security, network security, product security, cyber defence, technology">

  <meta name="description"
    content="AISS 2025 is truly an industry-led Cyber Security conference which considers the breadth as well as the depth of the Cyber Security ecosystem of the country and beyond. Book Your Tickets Now!">

  <meta property="og:description"
    content="AISS 2025 is truly an industry-led Cyber Security conference which considers the breadth as well as the depth of the Cyber Security ecosystem of the country and beyond. Book Your Tickets Now!">
  <meta property="og:image" content="{{ asset('images/social-cover.png') }}">
  <meta property="og:site_name" content="DSCI">
  <meta property="og:title" content="Nasscom-DSCI Annual Information Security Summit 2025 | December 2025 | New Delhi">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.dsci.in/event/aiss-2025">

  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/vnd.microsoft.icon" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="{{ asset('css/fonts/poppins.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
  <link href="{{ asset('css/fonts/roboto.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" media="print" onload="this.media='all'">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/slick.css') }}" media="print"
    onload="this.media='all'" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lib/slick-theme.css') }}" media="print"
    onload="this.media='all'" />
  <link rel="stylesheet" rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" media="print"
    onload="this.media='all'">
  <link rel="stylesheet" rel="preload" href="{{ asset('css/style.css') }}?v=1.3.0" as="style" media="print"
    onload="this.media='all'">
  <link rel="stylesheet" rel="preload" href="{{ asset('css/schedule.css') }}?v=1.0" as="style" media="print"
    onload="this.media='all'">
  <link rel="stylesheet" href="{{ asset('css/custom-navbar.css') }}?v=1.0">

  <noscript>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-navbar.css') }}">
  </noscript>

  <!-- Force navbar transparency with highest specificity -->
  <style>
    html body .navbar.transparent-navbar {
      background-color: #A56CFF !important;
    }

    html body .navbar.scrolled {
      background-color: rgba(165, 108, 255, 0.66) !important;
      backdrop-filter: blur(11px);
      -webkit-backdrop-filter: blur(11px);
    }
  </style>

  <title>@yield('title', 'AISS 2025 | Annual Information Security Summit 2025 | DSCI')</title>

  @yield('custom-css')

  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '856728422880103');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=856728422880103&ev=PageView&noscript=1" /></noscript>
  <!-- End Facebook Pixel Code -->
</head>

<body>
  <!-- Preloader -->
  @include('partials.preloader')

  <!-- Main Content -->
  @yield('content')

  <!-- Scripts -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/lib/slick.min.js') }}"></script>
  <script src="{{ asset('js/scripts.js') }}"></script>

  @yield('custom-js')
</body>

</html>
