<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl mb-4">Let's find your next job</h1>
            <form action="" class="max-w-xl mx-auto">
                <input type="text" placeholder="I'm looking for..." class="w-full rounded-xl bg-gray-400/10 dark:bg-white/5 border-black/10 dark:border-white/10 px-5 py-4 w-full max-w-xl border">
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