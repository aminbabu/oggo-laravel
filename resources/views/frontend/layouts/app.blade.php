<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('meta-data')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon" />

    <!-- Site Title -->
    <title>@yield('title') @yield('title-seperator') {{ config('app.name', 'Oggo') }}</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap530/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome-free640/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/jquery-nice-select110/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owlCarousel2/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">

    @stack('styles')
</head>

<body>
    <!-- Start: Header Area -->
    @includeIf('frontend.components.header')
    <!-- End: Header Area -->

    <!-- Start: Main Sections -->
    @yield('content')
    <!-- End: Main Sections -->

    <!-- Start: Footer Area -->
    @includeIf('frontend.components.footer')
    <!-- End: Footer Area -->

    <!-- Scripts -->
    <script src="{{ asset('frontend/vendor/jQuery/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap530/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/jquery-nice-select110/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owlCarousel2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                autoDisplay: false,
                includedLanguages: 'en,tr',
                layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    @stack('scripts')
</body>

</html>
