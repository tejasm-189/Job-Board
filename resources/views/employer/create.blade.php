<x-layout>
    <x-section-heading>Register as an Employer</x-section-heading>

    <form method="POST" action="/employer" class="max-w-xl mx-auto space-y-6">
        @csrf

        <div class="flex flex-col gap-y-2">
            <x-forms.label name="name" label="Company Name" />
            <input type="text" name="name" id="name" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" value="{{ old('name') }}">
            @error('name')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-colors w-full">Create Employer Account</button>
    </form>
</x-layout>