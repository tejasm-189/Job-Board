@props(['job'])

<div class="p-2 bg-gray-400/10 dark:bg-white/5 rounded-xl flex gap-x-4 border border-transparent hover:border-blue-800 group transition-colors duration-300">
    <div>
        <img class="rounded-xl border border-gray-700 w-16 h-16 object-cover" src="https://picsum.photos/seed/{{ $job->id }}/100/100" alt="">
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="self-start text-xs text-gray-400">{{ $job->location }}</a>

        <h3 class="font-bold text-lg mt-1 group-hover:text-blue-800 transition-colors duration-300">
            <a href="/jobs/{{ $job->id }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>

        <p class="text-xs text-gray-400 mt-1">{{ Str::limit($job->description, 100) }}</p>

        <p class="text-sm text-gray-400 mt-auto font-semibold text-green-600 dark:text-green-400">
            {{ Str::startsWith($job->salary, '$') ? $job->salary : '$' . number_format($job->salary) }}
        </p>
    </div>

    <div>
        <x-tag>{{ $job->category }}</x-tag>
        <x-tag>{{ $job->experience }}</x-tag>
    </div>
</div>