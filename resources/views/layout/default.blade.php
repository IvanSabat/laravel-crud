<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Multi Step Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>
<body style="background-color: #f3fdf3">

<div class="container">
    <h2>Multi Step Form</h2>
    @yield('content')
</div>

</body>

</html>
