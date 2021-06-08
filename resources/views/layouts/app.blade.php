<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gst</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="/css/app.css">
        {{-- <link rel="stylesheet" href="css/animate.css"> --}}
        {{-- <link rel="stylesheet" href="/fonts/bootstrap/dist/css/bootstrap.css"> --}}
        {{-- <link rel="stylesheet" href="/css/bootstrap-datepicker.css"> --}}
        {{-- <link rel="stylesheet" href="/css/bootstrap-datepicker.min.css"> --}}
        <link rel="stylesheet" type="/text/css" href="font-awesome/css/font-awesome.min.css">  
        {{-- <link rel="stylesheet" href="/css/flaticon.css"> --}}
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	{{-- <link rel="stylesheet" href="../assets/css/atlantis.min.css"> --}}

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <body data-background-color="dark">
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
        @include('footer')

        @stack('modals')

        @livewireScripts
    </body>
</html>
