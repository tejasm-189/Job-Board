<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Job Board' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="bg-white dark:bg-black text-black dark:text-white font-sans antialiased">
    <div class="px-10 py-6">
        <nav class="flex justify-between items-center mb-4 border-b border-black/10 dark:border-white/10 pb-4">
            <div>
                <a href="/" class="text-xl font-bold">Job Board</a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="#">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>
            <div class="space-x-4 font-bold flex items-center">
                <button onclick="toggleTheme()" class="bg-black/10 dark:bg-white/10 hover:bg-black/20 dark:hover:bg-white/20 px-3 py-1 rounded-md transition-colors">
                    Theme
                </button>
                <a href="#">Post a Job</a>

                @auth
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs font-bold text-red-500 hover:text-red-600 transition-colors">Log Out</button>
                </form>
                @endauth

                @guest
                <a href="/login" class="text-sm font-bold hover:text-blue-600 transition-colors">Log In</a>
                @endguest
            </div>
        </nav>

        <main>
            @if(session('success'))
            <div role="alert" class="rounded-xl border border-green-600 bg-green-100 dark:bg-green-900/50 px-4 py-3 text-green-700 dark:text-green-100 mb-8">
                <p class="font-bold">Success!</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
            @endif
            @if(session('error'))
            <div role="alert" class="rounded-xl border border-red-600 bg-red-100 dark:bg-red-900/50 px-4 py-3 text-red-700 dark:text-red-100 mb-8">
                <p class="font-bold">Error!</p>
                <p class="text-sm">{{ session('error') }}</p>
            </div>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>

</html>