<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('meta-data')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ Vite::asset('resources/frontend/assets/images/favicon.png') }}"
        type="image/x-icon" />

    <!-- Site Title -->
    <title>@yield('title') @yield('title-seperator') {{ config('app.name', 'Oggo') }}</title>


    <!-- Styles -->
    @vite(['resources/css/app.css'])
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
    @vite(['resources/js/app.js'])
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
