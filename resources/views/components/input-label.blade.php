@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold uppercase mb-1 text-sm text-black dark:text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
