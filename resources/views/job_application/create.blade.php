<x-layout>
    <x-section-heading>Apply for {{ $job->title }}</x-section-heading>

    <form method="POST" action="/jobs/{{ $job->id }}/application" class="max-w-xl mx-auto space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col gap-y-2">
            <label for="expected_salary" class="font-bold text-sm text-black dark:text-white">Expected Salary</label>
            <input type="number" name="expected_salary" id="expected_salary" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" placeholder="50000" value="{{ old('expected_salary') }}">
            @error('expected_salary')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <label for="cv" class="font-bold text-sm text-black dark:text-white">Upload CV</label>
            <input type="file" name="cv" id="cv" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full">
            @error('cv')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-colors w-full">Apply</button>
    </form>
</x-layout>