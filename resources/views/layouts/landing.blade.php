<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 140px) !important;
        }

        .custom-shape-divider-bottom-1729560018 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1729560018 svg {
            position: relative;
            display: block;
            width: calc(177% + 1.3px);
            height: 200px;
        }

        .custom-shape-divider-bottom-1729560018 .shape-fill {
            fill: #FFFFFF;
        }

        .swiper-horizontal>.swiper-pagination-bullets,
        .swiper-pagination-bullets.swiper-pagination-horizontal,
        .swiper-pagination-custom,
        .swiper-pagination-fraction {
            bottom: 0 !important;
            top: auto !important;
            left: 0 !important;
        }

        .swiper-pagination {
            position: relative !important;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
        }

        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.css" rel="stylesheet" type="text/css" />
    @stack('assets')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- layout landing page --}}

<body class="font-sans antialiased bg-white">


    <div class="min-h-screen bg-white">

        <!-- Navbar -->
        <nav class="absolute top-0 left-0 w-full bg-transparent text-white z-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                <div class="text-2xl font-bold">SIRETA</div>
                <div class="md:flex hidden items-center">
                    <a href="#rekomendasi" class="mr-[30px] font-bold">Rekomendasi</a>
                    <a href="#all_wisata" class="mr-3 font-bold">Semua Wisata</a>
                    @if (Route::has('login'))
                        @auth
                            <x-landing.navigation />
                        @else
                            <a href="{{ route('login') }}"
                                class="font-bold rounded-md px-3 py-2  ring-1 ring-transparent transition ">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="btn btn-light rounded-md px-3 py-2 ring-1 ring-transparent transition">
                                    Register
                                </a>
                            @endif
                        @endauth

                    @endif
                </div>
                <div class="flex md:hidden items-center">
                    @if (Route::has('login'))
                        @auth
                            <x-landing.navigation />
                        @else
                            <a href="{{ route('login') }}"
                                class="font-bold rounded-md px-3 py-2  ring-1 ring-transparent transition ">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="btn btn-light rounded-md px-3 py-2 ring-1 ring-transparent transition">
                                    Register
                                </a>
                            @endif
                        @endauth

                    @endif
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->

    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>



    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    @stack('scripts')
    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

</body>

</html>
