<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - NgabFood</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <nav class="bg-orange-600 text-white py-5 shadow-md">
        <div class="max-w-6xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold flex items-center gap-3">
                NgabFood
            </h1>
            <div class="flex space-x-8 text-lg">
                <a href="/" class="hover:text-orange-200 transition">Home</a>
                <a href="/makanan" class="hover:text-orange-200 transition">Daftar Menu</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-6xl mx-auto px-6 py-8">
        @yield('content')
    </div>

</body>

</html>
