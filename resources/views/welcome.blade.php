<x-layout>
    <div class="space-y-6">
        <section class="text-center pt-2">
            <h1 class="font-bold text-4xl mb-4">Let's find your next job</h1>
            <form action="/" method="GET" class="mt-4" id="search-form">
                <div class="flex flex-wrap gap-4 justify-center mb-6">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="I'm looking for..." class="flex-1 min-w-[300px] rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600">

                    <div class="flex gap-2">
                        <input type="number" name="min_salary" value="{{ request('min_salary') }}" placeholder="Min Salary" class="w-24 md:w-32 rounded-xl bg-white/5 border-white/10 px-3 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 text-sm">
                        <input type="number" name="max_salary" value="{{ request('max_salary') }}" placeholder="Max Salary" class="w-24 md:w-32 rounded-xl bg-white/5 border-white/10 px-3 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600 text-sm">
                    </div>

                    <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-colors">
                        Search
                    </button>
                </div>

                <div class="grid md:grid-cols-2 gap-8 border-t border-black/10 dark:border-white/10 pt-6">
                    <div class="flex flex-col items-center md:items-end gap-y-2">
                        <span class="font-bold text-sm text-black dark:text-white">Category</span>
                        <div class="flex flex-wrap justify-center gap-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="category" value="" {{ request('category') ? '' : 'checked' }} class="form-radio text-blue-600 bg-gray-100 dark:bg-white/5 border-gray-300 dark:border-white/10 focus:ring-blue-600">
                                <span class="ml-2 text-black dark:text-white">All</span>
                            </label>
                            @foreach(\App\Models\Job::$categories as $category)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="category" value="{{ $category }}" {{ request('category') == $category ? 'checked' : '' }} class="form-radio text-blue-600 bg-gray-100 dark:bg-white/5 border-gray-300 dark:border-white/10 focus:ring-blue-600">
                                <span class="ml-2 text-black dark:text-white">{{ $category }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex flex-col items-center md:items-start gap-y-2">
                        <span class="font-bold text-sm text-black dark:text-white">Experience</span>
                        <div class="flex flex-wrap justify-center gap-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="experience" value="" {{ request('experience') ? '' : 'checked' }} class="form-radio text-blue-600 bg-gray-100 dark:bg-white/5 border-gray-300 dark:border-white/10 focus:ring-blue-600">
                                <span class="ml-2 text-black dark:text-white">All</span>
                            </label>
                            @foreach(\App\Models\Job::$experience as $experience)
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="radio" name="experience" value="{{ $experience }}" {{ request('experience') == $experience ? 'checked' : '' }} class="form-radio text-blue-600 bg-gray-100 dark:bg-white/5 border-gray-300 dark:border-white/10 focus:ring-blue-600">
                                <span class="ml-2 text-black dark:text-white">{{ ucfirst($experience) }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <section class="pt-10">
            <x-section-heading>Featured Jobs</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach($featuredJobs as $job)
                <x-job-card :job="$job" />
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-2 grid lg:grid-cols-3 gap-4">
                @foreach($jobs as $job)
                <x-job-card-wide :job="$job" />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>