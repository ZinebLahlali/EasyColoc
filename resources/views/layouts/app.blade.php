<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 flex">

    <aside class="w-64 h-screen bg-white border-r flex flex-col p-6">
        <div class="flex items-center gap-2 text-indigo-600 font-bold text-xl mb-10">
            <i class="fas fa-home"></i> EasyColoc
        </div>
        
        <nav class="space-y-4 flex-1">
            <a href="{{route('dashboard')}}" class="flex items-center gap-3 text-gray-600 hover:text-indigo-600">
                <i class="fas fa-th-large w-5"></i> Dashboard
            </a>
            <a href="{{route('colocations.index')}}" class="flex items-center gap-3 text-indigo-600 font-semibold bg-indigo-50 p-2 rounded-lg">
                <i class="fas fa-users w-5"></i> Colocations
            </a>
            <a href="{{route('profile.edit')}}" class="flex items-center gap-3 text-gray-600 hover:text-indigo-600">
                <i class="fas fa-user w-5"></i> Profile
            </a>
        </nav>

        <div class="bg-gray-900 text-white p-4 rounded-xl mt-auto">
            <p class="text-xs text-gray-400 uppercase">Votre réputation</p>
            <p class="text-lg font-bold">+0 points</p>
            <div class="w-full bg-gray-700 h-1 rounded-full mt-2">
                <div class="bg-green-500 h-1 w-1/4 rounded-full"></div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col">
        <header class="flex justify-between items-center p-6 bg-white border-b">
            <h1 class="text-xl font-bold italic text-gray-700">COLOC 1</h1>
            <div class="flex items-center gap-4">
                <span class="text-xs text-green-500 font-semibold uppercase">User 1 en ligne</span>
                <div class="w-10 h-10 bg-gray-800 text-white flex items-center justify-center rounded-full font-bold">U</div>
            </div>
        </header>

        <div class="p-8">
            @yield('content')
        </div>
    </main>

</body>
</html>