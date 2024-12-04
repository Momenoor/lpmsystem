<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset("storage/".setting('favicon'))}}" type="image/png">
    <title>{{ setting('site_title') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{asset('css/bootstrap.rtl.full.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/color.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/icon-fonts.css')}}" rel="stylesheet">

    <!--Rev Slider Start-->
    <link rel="stylesheet" href="{{asset('js/rev-slider/css/settings.css')}}" type='text/css' media='all'/>
    <link rel="stylesheet" href="{{asset('js/rev-slider/css/layers.css')}}" type='text/css' media='all'/>
    <link rel="stylesheet" href="{{asset('js/rev-slider/css/navigation.css')}}" type='text/css' media='all'/>

</head>
<body>
<div id="app">
    <div class="wrapper homepage-style-1">
        @include('layouts.header')

        <main class="main-content">
            @yield('content')
        </main>
        @include('layouts.newsletter')
        @include('layouts.footer')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.js')}}" type="text/javascript"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/rev-slider/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/rev-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/rev-slider.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('js/rev-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
<!-- Scripts -->
</body>
</html>
