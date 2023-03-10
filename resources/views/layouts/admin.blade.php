<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
{{--        <script src="{{ asset('vendor/glider-js/glider.min.js') }}"></script>--}}
{{--        <script src="{{ asset('vendor/flex-slider/jquery.flexslider-min.js') }}"></script>--}}
{{--        <script src="{{ asset('vendor/flex-slider/node_modules/jquery/dist/jquery.js') }}"></script>--}}
        <script src="{{asset('vendor/fontawesome-free/js/all.js') }}"></script>
        <script src=" {{ mix('js/app.js') }}"></script>
        <script src="{{ asset('vendor/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.js') }}"></script>
        <script src="{{ asset('vendor/dropzone/dist/dropzone.js') }}"></script>


        <!-- Styles -->

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
{{--        <link rel="stylesheet" href="{{ asset('vendor/glider-js/glider.min.css') }}">--}}
{{--        <link rel="stylesheet" href="{{ asset('vendor/flex-slider/flexslider.css') }}">--}}
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/dropzone/dist/dropzone.css') }}">
        @livewireStyles

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            function dropdown(){
                return {
                    open: false,
                    show(){
                        if(this.open){
                            this.open = false;
                            document.getElementsByTagName('html')[0].style.overflow = 'auto'
                        }else{
                            this.open = true;
                            document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                        }
                    },
                    close(){
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto'
                    }
                }
            }
        </script>
    @stack('scripts')


    </body>
</html>
