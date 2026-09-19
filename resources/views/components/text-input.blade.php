@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-black/20 focus:border-[var(--green-700)] focus:ring-[var(--green-700)] rounded-md shadow-sm']) }}>
