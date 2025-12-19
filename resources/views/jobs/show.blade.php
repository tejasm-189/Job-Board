<x-layout>
    <div class="space-y-10">
        <nav class="flex text-sm font-medium text-gray-500 dark:text-gray-400 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="/" class="hover:text-blue-600 dark:hover:text-white transition-colors">Home</a>
                </li>
                <li>
                    <span class="mx-2 text-gray-400">/</span>
                </li>
                <li>
                    <a href="/" class="hover:text-blue-600 dark:hover:text-white transition-colors">Jobs</a>
                </li>
                <li>
                    <span class="mx-2 text-gray-400">/</span>
                </li>
                <li aria-current="page">
                    <span class="text-black dark:text-white font-semibold">{{ $job->title }}</span>
                </li>
            </ol>
        </nav>
        <section class="text-center pt-6">
            <div class="relative inline-block">
                <img class="rounded-xl border border-gray-700 mx-auto mb-6" src="https://picsum.photos/seed/{{ $job->id }}/100/100" alt="">
            </div>

            <h1 class="font-bold text-4xl mb-2">{{ $job->title }}</h1>
            <p class="text-xl text-gray-400">{{ $job->salary }}</p>

            <div class="mt-6 flex justify-center gap-x-2">
                <x-tag>{{ $job->category }}</x-tag>
                <x-tag>{{ $job->experience }}</x-tag>
            </div>
        </section>

        <section class="bg-gray-400/10 dark:bg-white/5 rounded-xl p-10 border border-black/10 dark:border-white/10">
            <h2 class="font-bold text-2xl mb-4">Job Description</h2>
            <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                {!! nl2br(e($job->description)) !!}
            </div>

            <div class="mt-8 pt-8 border-t border-white/10 flex justify-between items-center">
                <div class="text-sm text-gray-400">
                    Location: <span class="text-black dark:text-white font-bold">{{ $job->location }}</span>
                </div>

                <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                    Apply Now
                </button>
            </div>
        </section>

        @if($otherJobs->count() > 0)
        <section>
            <x-section-heading>Other jobs from {{ $job->employer->name }}</x-section-heading>

            <div class="mt-6 grid lg:grid-cols-3 gap-8">
                @foreach($otherJobs as $otherJob)
                <x-job-card :job="$otherJob" />
                @endforeach
            </div>
        </section>
        @endif
    </div>
</x-layout>