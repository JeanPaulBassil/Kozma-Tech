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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                    {{ __('Dashboard') }}
                </h2>
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" role="button">Admin Dashboard</a>
                @endif
            </div>
        </x-slot>

        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h1 class="card-title">Your PC Builds</h1>
                            <a href="{{ route('pcbuilds.create') }}" class="btn btn-success mb-3">Create New Build</a>

                            @if(isset($pcBuilds) && $pcBuilds->isNotEmpty())
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Build Name</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pcBuilds as $build)
                                            <tr>
                                                <th scope="row">{{ $build->id }}</th>
                                                <td>{{ $build->name }}</td>
                                                <td>${{ number_format($build->total_price, 2) }}</td>
                                                <td>
                                                    <a href="" class="btn btn-primary">View Build</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted">You have no PC builds.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
