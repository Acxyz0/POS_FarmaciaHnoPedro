<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-100 border border-transparent rounded-lg font-bold text-sm text-white dark:text-black uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-sky-700 hover:text-white focus:bg-gray-700 dark:focus:bg-sky-700 active:bg-gray-900 dark:active:bg-sky-700 dark:active:text-white focus:outline-none focus:ring focus:ring-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
