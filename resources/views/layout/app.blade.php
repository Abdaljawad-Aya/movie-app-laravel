<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Movie App</title>
</head>

<body class="font-sans bg-blue-900 text-white">
    <nav class="border-b border-blue-800"> 
        <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-2 py-2">
            <ul class="flex flex-col md:flex-row items-center">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <img alt="image" class="md:ml-16 mt-3 md:mt-0" src="{{ asset('img/test.png') }}"
                            width="125px" />
                    </a>
                </li>
            </ul>

            <div
                class="text-md font-medium text-center text-blue-100  border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">

                    <li class="mr-2">
                        <a href="{{ route('movies.index') }}"
                            class="inline-block p-4 text-blue-100 rounded-t-lg border-b-2 border-blue-600 dark:text-blue-500 hover:border-gray-300"
                            aria-current="page">Movies</a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-blue-600 hover:border-gray-300 dark:hover:text-gray-300">TV
                            Shows</a>
                    </li>

                </ul>
            </div>
            {{-- Search section --}}
            <div class="flex items-center py-5">
            <div class="relative">
                <input type="text" id="search-navbar"
                    class="block p-2 pl-10 w-full text-gray-900 bg-gray-50  border border-gray-300 sm:text-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 
                          focus:outline-none focus:shadow-outline
                    "
                    placeholder="Search...">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none ">
                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <div class="ml-4">
                <a href="#">
                    <img src="{{ asset('img/white.jpg') }}" alt="avatar" class="rounded-full w-8 h-8">
                </a>
            </div>
        </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>