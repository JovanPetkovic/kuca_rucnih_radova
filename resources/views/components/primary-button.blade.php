<button {{ $attributes->merge(['type' => 'submit', 'class' => 'h-12 w-36 inline-flex items-center justify-center px-4 py-2 bg-amber-400 dark:bg-gray-200 border border-transparent rounded-3xl font-semibold text-base text-white dark:text-gray-800 tracking-wide hover:bg-amber-500 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-amber-700 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
