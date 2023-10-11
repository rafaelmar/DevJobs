<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-400 border border-transparent rounded-md font-semibold text-xs text-black dark:text-black-800 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo focus:bg-indigo-700 dark:focus:bg-indigo active:bg-indigo-900 dark:active:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-indigo-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
