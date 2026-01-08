<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Bugo Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-600 p-4 shadow-md mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-xl font-bold">Bugo Portal</a>
            
            <div class="space-x-4">
                <a href="/residents" class="text-white hover:text-blue-200 transition">Residents</a>
                <a href="/about" class="text-white hover:text-blue-200 transition">About Us</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>

</body>
</html>