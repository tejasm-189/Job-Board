<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl mb-4">Let's find your next job</h1>
            <form action="/" method="GET" class="mt-6 max-w-2xl mx-auto space-y-4 md:space-y-0 md:flex md:gap-x-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="I'm looking for..." class="w-full rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-black dark:text-white placeholder-gray-500 focus:border-blue-600 focus:ring-blue-600">

                <select name="category" class="w-full md:w-auto rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-gray-400 dark:text-white focus:border-blue-600 focus:ring-blue-600">
                    <option value="" class="text-gray-900">Category</option>
                    @foreach(\App\Models\Job::$categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }} class="text-gray-900">{{ $category }}</option>
                    @endforeach
                </select>

                <select name="experience" class="w-full md:w-auto rounded-xl bg-white/5 border-white/10 px-5 py-4 border border-gray-200 dark:border-white/10 text-gray-400 dark:text-white focus:border-blue-600 focus:ring-blue-600">
                    <option value="" class="text-gray-900">Experience</option>
                    @foreach(\App\Models\Job::$experience as $experience)
                    <option value="{{ $experience }}" {{ request('experience') == $experience ? 'selected' : '' }} class="text-gray-900">{{ ucfirst($experience) }}</option>
                    @endforeach
                </select>

                <button type="submit" class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-xl transition-colors">
                    Search
                </button>
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
            <x-section-heading>Tags</x-section-heading>

            <div class="mt-6 space-x-1">
                @foreach($tags as $tag)
                <x-tag>{{ $tag }}</x-tag>
                @endforeach
            </div>
        </section>

        <section>
            <x-section-heading>Recent Jobs</x-section-heading>

            <div class="mt-6 space-y-6">
                @foreach($jobs as $job)
                <x-job-card-wide :job="$job" />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>