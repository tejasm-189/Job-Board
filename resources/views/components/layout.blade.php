<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Job Board' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-slate-900 font-sans antialiased">
    <div class="max-w-[986px] mx-auto px-10 py-10">
        <nav class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
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
                <a href="#">Post a Job</a>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>