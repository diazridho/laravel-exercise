<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- reference asset -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) 


</head>

<body class='h-full'>
    <div class="min-h-full">

    <!-- kode rumit ada di components navbar -->
    <x-navbar />

    <!-- mengisi $slot di header_comp -->
    <x-header_comp> {{ $title }} </x-header_comp>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h3 class="text-white">{{ $slot }}</h3>
        </div>
    </main>
    </div>

</body>
</html>
