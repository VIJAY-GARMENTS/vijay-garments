<div class="flex flex-col sm:flex-row justify-between items-center p-5">

    <x-storyset.programer/>

    <div
        class="w-full animate__animated wow animate__fadeInDown  p-5">

        <div class="relative inline-block">
            <span class=" text-3xl md:text-6xl font-bold font-serif animate__animated wow animate__fadeOut">
                CODEXSUN
            </span>
            <span
                class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-red-500 via-orange-400 to-yellow-600 rounded-full"></span>
        </div>

        <h1 class="text-zinc-400 py-3 text-lg font-semibold">Software make simple</h1>

        <h1 class="mb-5 font-extrabold text-2xl sm:text-4xl text-zinc-500">Manage your business like never
            before</h1>

        <p class="py-2 font-light tracking-widest text-zinc-500 text-balance max-w-5xl">
            The perfect key for unlocking business growth is Infusing Intelligence to your business.
            Start getting complete business solution package with end-to-end management.</p>

        <a
            href="{{ route('demo-requests.upsert') }}"
            class="animate-pulse focus:animate-none hover:animate-none inline-flex text-2xl bg-green-600 px-4 py-2 mt-3 rounded-lg cursor-pointer
                    tracking-wide text-white font-mono font-bold">
            <span class="px-5"> Book for demo</span>
            <x-icons.elements :icon="'notebook'" class="w-10 h-auto block"/>
        </a>

    </div>
</div>
