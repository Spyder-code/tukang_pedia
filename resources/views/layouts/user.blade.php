<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.4-web/css/all.css') }}">
    <script src="{{ asset('fontawesome-free-5.15.4-web/js/all.js') }}"></script>
    <title>Tukang Pedia</title>
</head>
<body class="bg-gray-200">
    <header class="bg-blue-500 rounded-b-3xl">
        <div class="flex justify-between border-b border-white">
            <nav class="flex justify-center text-white ml-10 py-2">
                <a class="mr-10 mt-1" href="">Seller Center</a>
                <p class="mr-5 mt-1">Follow us</p>
                <span class="text-xl mx-2"><i class="fab fa-instagram"></i></span>
                <span class="text-xl mx-2"><i class="fab fa-facebook"></i></span>
                <span class="text-xl mx-2"><i class="fab fa-twitter"></i></span>
                <span class="text-xl mx-2"><i class="fab fa-telegram"></i></span>
            </nav>
            <nav class="flex justify-center text-white ml-10 py-2">
                <a class="mr-10 mt-1" href="">Bantuan</a>
                <a class="mr-10 mt-1" href="{{ route('page.account') }}">Login</a>
            </nav>
        </div>
        <div class="py-10 flex justify-center border-b border-white">
            <div class="w-2/4 text-right my-auto">
                <h1 class="text-white text-4xl">TUKANGPEDIA</h1>
            </div>
            <div class="w-1/2 flex justify-center">
                <input type="text" class="rounded-full px-3 bg-white h-10 w-72 my-auto focus:border-blue-100" placeholder="Search" >
            </div>
            <div class="w-2/4 text-left">
                <img src="{{ asset('/') }}images/craftsman.png" class="h-20">
            </div>
        </div>
        <nav class="flex ml-28 gap-10 py-3">
            <a class="text-white text-xl hover:text-blue-900" href="{{ route('page.home') }}">Home</a>
            <a class="text-white text-xl hover:text-blue-900" href="">Mitra</a>
            <a class="text-white text-xl hover:text-blue-900" href="">Download App</a>
            <a class="text-white text-xl hover:text-blue-900" href="">Paket borongan</a>
        </nav>
    </header>

    @yield('content')

    <footer class="footer bg-gray-500 text-white relative pt-1 border-b-2 border-blue-700">
        <div class="container mx-auto px-6">
            <div class="sm:flex sm:mt-8">
                <div class="mt-8 sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
                    <div class="flex flex-col">
                        <span class="font-bold text-white uppercase mb-2">Primary Link</span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Home</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Mitra</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Download App</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Paket Borongan</a></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white uppercase mt-4 md:mt-0 mb-2">Mitra</span>
                        <span class="my-2"><a href="#" class="text-white text-md hover:text-blue-500">Seller center</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Registration</a></span>
                        <span class="my-2"><a href="#" class="text-white text-md hover:text-blue-500">Login</a></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white uppercase mt-4 md:mt-0 mb-2">Social Media</span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Instagram</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Facebook</a></span>
                        <span class="my-2"><a href="#" class="text-white  text-md hover:text-blue-500">Twiteer</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-6">
            <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
                <div class="sm:w-2/3 text-center py-6">
                    <p class="text-sm text-white font-bold mb-2">
                        © 2022 Spydercode
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>
</html>
