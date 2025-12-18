@props(['size' => 'base'])

@php
$classes = "bg-black/10 hover:bg-black/25 dark:bg-white/10 dark:hover:bg-white/25 rounded-xl font-bold transition-colors duration-300";

if ($size === 'base') {
$classes .= " px-5 py-1 text-sm";
}

if ($size === 'small') {
$classes .= " px-3 py-1 text-2xs";
}
@endphp

<a href="#" class="{{ $classes }}">{{ $slot }}</a>