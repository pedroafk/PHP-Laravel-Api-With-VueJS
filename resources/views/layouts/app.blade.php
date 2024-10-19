<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Booking System</title>
    @vite('resources/css/app.css') <!-- Inclui o CSS do Tailwind -->
</head>
<body>
    <div id="app" class="container mx-auto"> <!-- Um container centralizado -->
        @yield('content') <!-- Aqui será injetado o conteúdo das outras views -->
    </div>
    @vite('resources/js/app.js') <!-- Inclui o JS do Vue -->
</body>
</html>
