<x-layout>
    <x-section-heading>My Jobs</x-section-heading>

    <div class="mt-8 grid gap-8">
        @forelse($jobs as $job)
        <div class="rounded-xl bg-white/5 border border-white/10 p-4 flex justify-between items-center group">
            <div class="flex items-center gap-x-4">
                <div class="flex-1">
                    <h3 class="font-bold text-lg group-hover:text-blue-600 transition-colors">
                        <a href="/jobs/{{ $job->id }}">{{ $job->title }}</a>
                    </h3>
                    <p class="text-xs text-gray-400">{{ $job->employer->name }}</p>
                    <div class="mt-2 text-xs font-bold space-x-2">
                        <span class="bg-white/10 px-2 py-1 rounded">{{ $job->location }}</span>
                        <span class="bg-white/10 px-2 py-1 rounded">${{ $job->salary }}</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-end gap-y-2">
                <div class="text-sm font-bold text-white mb-2">
                    {{ $job->applications->count() }} {{ Str::plural('Applicant', $job->applications->count()) }}
                </div>
                <div class="flex gap-x-2">
                    <a href="/my-jobs/{{ $job->id }}/edit" class="bg-white/10 hover:bg-white/20 text-white font-bold py-2 px-4 rounded transition-colors text-sm">Edit</a>
                    {{-- Delete will come later or can be added now, but focusing on Edit next --}}
                </div>
            </div>
        </div>
        @empty
        <div class="text-center text-gray-400">
            You haven't posted any jobs yet.
        </div>
        @endforelse
    </div>

    <div class="mt-8 text-center">
        <a href="/jobs/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-xl transition-colors">Post a New Job</a>
    </div>
</x-layout>