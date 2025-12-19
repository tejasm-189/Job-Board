<x-layout>
    <x-section-heading>Log In</x-section-heading>

    <form method="POST" action="/login" class="max-w-xl mx-auto space-y-6">
        @csrf

        <div class="flex flex-col gap-y-2">
            <label for="email" class="font-bold text-sm text-black dark:text-white">Email</label>
            <input type="email" name="email" id="email" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full" value="{{ old('email') }}">
            @error('email')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-y-2">
            <label for="password" class="font-bold text-sm text-black dark:text-white">Password</label>
            <input type="password" name="password" id="password" required class="rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 w-full">
            @error('password')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-colors w-full">Log In</button>
    </form>
</x-layout>