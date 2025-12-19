@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <span class="w-2 h-2 bg-black dark:bg-white inline-block rounded-full"></span>
    <label class="font-bold text-sm text-black dark:text-white" for="{{ $name }}">{{ $label }}</label>
</div>