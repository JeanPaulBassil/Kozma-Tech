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
                    {{ __('Build') }}
                </h2>
                @if(Auth::user() && Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" role="button">Admin Dashboard</a>
                @endif
            </div>
        </x-slot>
        <div class="container">
            <form action="{{ route('pcbuilds.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="buildName" name="name" placeholder="Build Name">
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Component Type</th>
                            <th>Selected Component</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CPU</td>
                            <td id="selectedCpu">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'cpu') }}" class="btn btn-secondary">Select CPU</a></td>
                        </tr>
                        <tr>
                            <td>Cooler</td>
                            <td id="selectedCooler">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'cooler') }}" class="btn btn-secondary">Select Cooler</a></td>
                        </tr>
                        <tr>
                            <td>GPU</td>
                            <td id="selectedGpu">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'gpu') }}" class="btn btn-secondary">Select GPU</a></td>
                        </tr>
                        <tr>
                            <td>Motherboard</td>
                            <td id="selectedMotherboard">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'motherboard') }}" class="btn btn-secondary">Select Motherboard</a></td>
                        </tr>
                        <tr>
                            <td>Case</td>
                            <td id="selectedCase">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'case') }}" class="btn btn-secondary">Select Case</a></td>
                        </tr>
                        <tr>
                            <td>Power Supply</td>
                            <td id="selectedPowerSupply">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'powersupply') }}" class="btn btn-secondary">Select Power Supply</a></td>
                        </tr>
                        <tr>
                            <td>RAM</td>
                            <td id="selectedRam">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'ram') }}" class="btn btn-secondary">Select RAM</a></td>
                        </tr>
                        <tr>
                            <td>Storage</td>
                            <td id="selectedStorage">None Selected</td>
                            <td><a href="{{ route('build.selectComponent', 'storage') }}" class="btn btn-secondary">Select Storage</a></td>
                        </tr>
                    </tbody>
                    
                </table>

                <div class="form-group">
                    <label>Total Build Price: </label>
                    <span id="totalPrice">$0.00</span>
                </div>

                <button type="submit" class="btn btn-save-build">Save Build</button>
                <a href="{{ route('dashboard') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </x-app-layout>
</body>
</html>