<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Quizz</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-teal-700 font-inter">
    <x-navbar>
        <div class="container mx-auto flex  items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold ml-7 mr-2 text-white">{{ $title }}</h1>
                <img src="{{ asset('storage/images/Frog_logo.png') }}" alt="" class="size-16 object-cover aspect-square align-center items-center py-2">
            </div>
        </div>
    </x-navbar>
</body>
</html>