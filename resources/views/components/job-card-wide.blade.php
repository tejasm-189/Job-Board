@props(['job'])

<div class="p-4 bg-gray-400/10 dark:bg-white/5 rounded-xl flex gap-x-6 border border-transparent hover:border-blue-800 group transition-colors duration-300">
    <div>
        <img class="rounded-xl border border-gray-700" src="https://picsum.photos/seed/{{ $job->id }}/100/100" alt="">
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-sm text-gray-400">{{ $job->location }}</a>

        <h3 class="font-bold text-xl mt-3 group-hover:text-blue-800 transition-colors duration-300">{{ $job->title }}</h3>

        <p class="text-sm text-gray-400 mt-2">{{ Str::limit($job->description, 300) }}</p>

        <p class="text-sm text-gray-400 mt-auto font-semibold text-green-600 dark:text-green-400">
            {{ Str::startsWith($job->salary, '$') ? $job->salary : '$' . number_format($job->salary) }}
        </p>
    </div>

    <div>
        <x-tag>{{ $job->category }}</x-tag>
        <x-tag>{{ $job->experience }}</x-tag>
    </div>
</div>