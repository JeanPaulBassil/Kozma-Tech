{{-- resources/views/admin/add.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
    <style>
        .btn-static { 
            color: black;
            padding: 10px;
            background-color: #007bff;
        }
    </style>
        
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add New Item') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('New Item Details') }}</div>
    
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.add') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="price">Price per item</label>
                                        <input type="number" class="form-control" id="price" name="price" min="0" required>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min "0" required>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" id="category" name="category" required>
                                    </div>
    
                                    <div class="form-group">
                                        <label for="image">Image Upload</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="form-group btn btn-primary">
                                    <button type="submit">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
     
</body>
</html>
