<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Job Board' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <div class="space-x-4 font-bold">
                <button onclick="toggleTheme()" class="bg-black/10 dark:bg-white/10 hover:bg-black/20 dark:hover:bg-white/20 px-3 py-1 rounded-md transition-colors">
                    Theme
                </button>
                <a href="#">Post a Job</a>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>