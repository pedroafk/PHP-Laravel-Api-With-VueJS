<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello World</title>

    <!-- Incluindo o CSS compilado pelo Vite -->
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Div onde o Vue.js será montado -->
    <div id="app">
        <!-- O Vue.js irá injetar o conteúdo aqui -->
    </div>

    <!-- Incluindo o JS compilado pelo Vite -->
    @vite('resources/js/app.js')
</body>
</html>
