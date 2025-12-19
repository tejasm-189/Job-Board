<x-layout>
    <x-section-heading>My Applications</x-section-heading>

    <div class="mt-8 grid gap-8">
        @forelse($applications as $application)
        <div class="rounded-xl bg-white/5 border border-white/10 p-4 flex justify-between items-center group">
            <div class="flex items-center gap-x-4">
                <img src="https://picsum.photos/seed/{{ $application->job->id }}/50/50" alt="" class="rounded-xl">
                <div>
                    <h3 class="font-bold text-lg group-hover:text-blue-600 transition-colors">
                        <a href="/jobs/{{ $application->job->id }}">{{ $application->job->title }}</a>
                    </h3>
                    <p class="text-xs text-gray-400">{{ $application->job->employer->name }}</p>
                </div>
            </div>

            <div>
                <div class="flex flex-col items-end gap-y-2">
                    <div>
                        <span class="text-xs text-gray-400">Asking Salary:</span>
                        <span class="font-bold">${{ number_format($application->expected_salary) }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">Avg. Asking Salary:</span>
                        <span class="font-bold">${{ number_format($application->job->applications_avg_expected_salary) }}</span>
                    </div>
                    <div>
                        <span class="text-xs text-gray-400">Other Applicants:</span>
                        <span class="font-bold">{{ $application->job->applications_count - 1 }}</span>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center text-gray-400">
            You haven't applied to any jobs yet.
        </div>
        @endforelse
    </div>
</x-layout>