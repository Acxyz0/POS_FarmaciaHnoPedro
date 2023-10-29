<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-300">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 mx-5 px-6 py-4 bg-teal-400 shadow-xl overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>