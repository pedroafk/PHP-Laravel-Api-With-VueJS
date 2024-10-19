<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
    @vite('resources/css/app.css') <!-- Inclui o CSS do Tailwind -->
</head>
<body>
    <div id="app" class="flex items-center justify-center h-screen">
        <h1 class="text-4xl font-bold">Hello, World!</h1>
    </div>
    @vite('resources/js/app.js') <!-- Inclui o JS do Vue -->
</body>
</html>
