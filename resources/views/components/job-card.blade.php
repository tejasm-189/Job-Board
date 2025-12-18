@props(['job'])

<div class="p-4 bg-gray-400/10 dark:bg-white/5 rounded-xl flex flex-col text-center border border-transparent hover:border-blue-800 group transition-colors duration-300">
    <div class="self-start text-sm">{{ $job->location }}</div>

    <div class="py-8">
        <h3 class="group-hover:text-blue-800 text-xl font-bold transition-colors duration-300">{{ $job->title }}</h3>
        <p class="text-xs text-gray-500 mt-2">{{ Str::limit($job->description, 100) }}</p>
        <p class="text-sm mt-4 font-semibold text-green-600 dark:text-green-400">
            {{ Str::startsWith($job->salary, '$') ? $job->salary : '$' . number_format($job->salary) }}
        </p>
    </div>

    <div class="flex justify-between items-center mt-auto">
        <div>
            <x-tag size="small">{{ $job->category }}</x-tag>
            <x-tag size="small">{{ $job->experience }}</x-tag>
        </div>

        <img class="rounded-xl border border-gray-700" src="https://picsum.photos/seed/{{ $job->id }}/42/42" alt="">
    </div>
</div>