{{-- resources/views/admin/dashboard.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card-body">
                    <a href="{{ route('admin.add') }}" class="btn btn-primary">Add New Item</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
