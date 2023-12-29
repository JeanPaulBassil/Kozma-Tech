<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                background-color: #f8fafc;
            }
            .header-link {
                margin-left: 1rem;
            }
            .shadow-sm {
                box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
            }
        </style>
    </head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <!-- Use a flex container with justify-content-between to space out the elements -->
            <div class="d-flex justify-content-between w-100">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <!-- This link will be pushed to the right side of the container -->
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" role="button">Admin Dashboard</a>
                @endif
            </div>
        </x-slot>
    
        <div class="py-12">z
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>





