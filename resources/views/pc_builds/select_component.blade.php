<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Build</title>
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
        .form-group {
            margin-top: 20px; /* Increased top margin for the input */
        }
        .btn-save-build {
            background-color: green;
            color: white;
            border-radius: 10px; /* Rounded corners */
            border: none;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                    {{ __('Select a') }} {{ ucfirst($type) }}
                </h2>
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" role="button">Admin Dashboard</a>
                @endif
            </div>
        </x-slot>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($components as $component)
                    <tr>
                        <td>{{ $component->name }}</td>
                        <td>{{ $component->description }}</td>
                        <td>${{ number_format($component->price, 2) }}</td>
                        <td>
                            <a href="{{ route('build.addComponentToSession', ['type' => $type, 'componentId' => $component->id]) }}" class="btn btn-primary">Choose</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>
</body>
</html>