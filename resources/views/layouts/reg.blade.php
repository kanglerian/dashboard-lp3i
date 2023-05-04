<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politeknik LP3I Kampus Tasikmalaya</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link href="{{ asset('css/flowbite.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/tailwind.js') }}"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-center items-center h-screen gap-10 px-5">
            <header>
                <div class="flex justify-center items-center">
                    <a href="#" role="button"><img src="{{ asset('img/lp3i.svg') }}"
                            alt="Politeknik LP3I Kampus Tasikmalaya" class="w-60"></a>
                </div>
            </header>
            <div class="w-full md:w-1/3 bg-white p-6 shadow-lg rounded-xl transition ease-in-out md:hover:scale-105">
                <h1 class="font-bold text-xl text-gray-800">Sign Up</h1>
                <p class="font-light text-sm text-gray-500 mt-1 mb-4">Please sign up for login to dashboard:</p>

                @if (session()->has('loginError'))
                    <div id="alert"
                        class="flex justify-between bg-red-50 text-red-800 px-3 py-2 mb-4 rounded-lg text-sm font-medium">
                        <p>{{ session('loginError') }}</p>
                        <button type="button" data-dismiss-target="#alert"><i class="fa-solid fa-xmark"></i></button>
                    </div>
                @endif

                <form action="{{ route('daptar') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK:</label>
                        <input type="text" name="nik" id="nik" placeholder="Type your NIK"
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('nik') }}</small>
                    </div>
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Type your name"
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2">
                        <small class="mt-2 text-xs text-red-500">
                            {{ $errors->first('name') }}</small>
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Type your username"
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2">
                        {{ $errors->first('username') }}</small>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Type your username"
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2">
                        {{ $errors->first('password') }}</small>
                    </div>
                    <div class="mb-4">
                        <label for="confirmpassword" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            Password:</label>
                        <input type="password" name="confirmpassword" id="confirmpassword"
                            placeholder="Type your confirm password"
                            class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2">
                    </div>
                    <div>
                        <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full md:w-auto px-5 py-2 text-center"><i
                                class="fa-solid fa-right-to-bracket mr-1"></i> Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/lottie-player.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/viewer-static.min.js') }}"></script>
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                center: true,
                items: 3,
                loop: true,
                margin: 20,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(() => {
            $('#btnAside').click(() => {

                $('#aside').animate({
                    width: 'toggle',
                    opacity: 'toggle'
                }, "easeinout");
            });
        });
    </script>


    <script>
        $(document).ready(() => {
            $('#navbarMenu').click(() => {
                let status = $('#navbar-dropdown').attr('data-attribute');
                $('#navbar-dropdown').animate({
                    height: "toggle",
                    opacity: "toggle"
                }, "easeinout", () => {
                    $('#navbar-dropdown').attr('data-attribute', status == '0' ? '1' : '0');
                });
            });
        });
    </script>

</body>

</html>
