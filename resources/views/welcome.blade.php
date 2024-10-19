<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css') <!-- Inclui o CSS do Tailwind -->
</head>
<body>
    <div id="app" class="flex items-center justify-center h-screen">
        <router-view></router-view> <!-- Renderiza a view de acordo com a rota atual -->
    </div>
    @vite('resources/js/app.js') <!-- Inclui o JS do Vue -->
</body>
</html>
