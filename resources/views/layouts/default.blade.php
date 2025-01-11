<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OfferWall-Affiliate | {{ $pageTitle }}</title>

        <!-- Fonts -->
        <link rel="icon" type="image/x-icon" href="/images/favicon.png">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"rel="stylesheet"/>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js']) 
        @endif
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <script>
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
        
            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        </script>
        @include('layouts.header')
        <div class="pt-[50px] md:pt-[80px] flex dashboardMain">
            @include('layouts.sidebar')
            <div class="dashboardContainer bg-[#F2F2F2]  pb-[100px]">
                @yield('content')
                @include('layouts.footer')
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const button = document.getElementById('menuToggle');

                button.addEventListener('click', function() {
                    document.body.classList.toggle('active');
                });
            });
        </script>
    </body>
</html>