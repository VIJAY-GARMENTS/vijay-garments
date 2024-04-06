<div>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <div class="loading w-full flex justify-center h-auto object-cover">
        <div class="w-full rounded h-full">

            <header id="header" class="header text-center">

                <div class="w-full sm:flex-row">

                    <div
                        class="xl:container grid grid-row-2 lg:grid-cols-2 mx-auto flex-row py-2 sm:py-5 px-5 sm:px-10 bg-white-900 sm:flex-row">

                        <div>
                            <x-storyset.programer/>
                        </div>

                        <div
                            class="w-full  p-5 order-1 grid-row-1 lg:flex-col-1 animate__animated wow animate__fadeInDown ">
                            <h1 class="pt-20 mb-5 text-blue-600 text-2xl font-semibold">CODEXSUN</h1>
                            <h1 class="mb-5 font-extrabold text-3xl text-zinc-600">Manage your business like never
                                before</h1>
                            <p class="py-2 font-light text-sm/relaxed text-zinc-500">
                                The perfect key for unlocking business growth is Infusing Intelligence to your business.
                            </p>
                            <p class="mb-5 font-light text-sm/relaxed  text-zinc-500">
                                Start getting complete business solution package with end-to-end management.</p>

                            <a href="{{ route('demo-requests') }}"
                               class="animate-bounce focus:animate-none hover:animate-none inline-flex text-md bg-green-600 mt-3 px-4 py-2 rounded-lg tracking-wide text-white font-mono font-bold">
                                <span class="ml-2"> Book for demo 🏀</span>
                            </a>

                        </div>
                    </div>
                </div>
            </header>

            <div class="pt-4 pb-14 text-center font-sans animate__animated wow animate__bounce">
                <div
                    class="container px-4 sm:px-8 xl:px-4 justify-items-center mx-auto  animate__animated animate__backInUp">
                    <p class="mb-4 text-gray-800 text-xl leading-10 lg:max-w-5xl lg:mx-auto">
                        The ability to trace requirements flow from their source (originator),
                        through the various project phases (design, prototyping, customizations, testing, piloting, and
                        delivery)
                        is a requirements generation best practice. Don’t
                        hesitate to give it a try today, and you will fall in love with it
                    </p>
                </div>
            </div>


        </div>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pure/3.0.0/pure-min.css"></script>

        <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
        <script>
            new PureCounter();
        </script>

        <script>
            new WOW().init();
        </script>
    </div>
</div>
