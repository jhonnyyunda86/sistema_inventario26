@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-zinc-700 bg-white/50 dark:bg-zinc-900/50 text-zinc-900 dark:text-zinc-100 focus:border-emerald-500 focus:ring-emerald-500 rounded-xl shadow-sm transition-all']) }}>
