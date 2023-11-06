<div>
    <div></div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 px-4 sm:pt-0 bg-teal-500 bg-opacity-60 bg-gradient-to-t from-slate-300">
        <div>
            {{ $logo }}
        </div>
    
        <div class="w-full sm:max-w-md mt-6 mx-5 px-6 py-4 bg-teal-400 shadow-xl overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <div></div>
</div>