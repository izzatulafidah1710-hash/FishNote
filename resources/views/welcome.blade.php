<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
            <div class="max-w-7xl w-full px-2 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-6xl font-bold text-gray-800 dark:text-gray-200">
                        Laravel
                    </h1>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">
                        The Laravel framework makes it simple to build modern, powerful web applications.
                    </p>

                    <div class="mt-6 flex justify-center">
                        <a href="https://laravel.com/docs" class="inline-block text-lg font-medium text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
