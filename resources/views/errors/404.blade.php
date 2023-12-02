{{-- resources/views/errors/404.blade.php --}}

<!DOCTYPE html>
<html>
<head>
    <title>Page Not Found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .error-container {
            padding-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container error-container">
        <h1 class="display-4">Oops! Page not found.</h1>
        <p class="lead">We can't seem to find the page you're looking for.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Return Home</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
