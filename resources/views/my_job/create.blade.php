<x-layout>
    <x-section-heading>Create a Job</x-section-heading>

    <form method="POST" action="/my-jobs" class="max-w-xl mx-auto space-y-6">
        @csrf

        <div class="flex flex-col gap-y-2">
            <x-forms.label name="title" label="Job Title" />
            <input type="text" name="title" id="title" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" placeholder="e.g. Senior Software Engineer" value="{{ old('title') }}">
            @error('title')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <x-forms.label name="description" label="Description" />
            <textarea name="description" id="description" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" rows="5">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <x-forms.label name="salary" label="Salary" />
            <input type="text" name="salary" id="salary" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" placeholder="e.g. $90,000 USD" value="{{ old('salary') }}">
            @error('salary')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <x-forms.label name="location" label="Location" />
            <input type="text" name="location" id="location" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" placeholder="e.g. Remote / New York" value="{{ old('location') }}">
            @error('location')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <label class="font-bold text-sm text-black dark:text-white">Category</label>
            <div class="grid grid-cols-2 gap-2">
                @foreach(\App\Models\Job::$categories as $category)
                <div class="flex items-center gap-2">
                    <input type="radio" name="category" value="{{ $category }}" id="category-{{ $category }}" required {{ old('category') == $category ? 'checked' : '' }}>
                    <label for="category-{{ $category }}" class="text-black dark:text-white">{{ $category }}</label>
                </div>
                @endforeach
            </div>
            @error('category')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <label class="font-bold text-sm text-black dark:text-white">Experience</label>
            <div class="grid grid-cols-3 gap-2">
                @foreach(\App\Models\Job::$experience as $experience)
                <div class="flex items-center gap-2">
                    <input type="radio" name="experience" value="{{ $experience }}" id="experience-{{ $experience }}" required {{ old('experience') == $experience ? 'checked' : '' }}>
                    <label for="experience-{{ $experience }}" class="text-black dark:text-white capitalize">{{ $experience }}</label>
                </div>
                @endforeach
            </div>
            @error('experience')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-colors w-full">Post Job</button>
    </form>
</x-layout>