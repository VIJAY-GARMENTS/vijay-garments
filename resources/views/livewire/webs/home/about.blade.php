<div>
    {{--<--- Our Team ---->--}}
    <section href="{{ route('about') }}">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <div class="team py-32 mx-auto bg-gray-100">
            <div class="container px-4 mx-auto justify-items-center sm:px-8">
                <h2 class="mb-12 text-center font-bold lg:max-w-xl lg:mx-auto">OUR TEAM MEMBERS</h2>
                {{--<---team member--->--}}
                <div id="progress" class=" slide-from-left container bg-gray-100 grid md:grid-cols-3 mx-auto justify-items-center">

                    <div class="md:grid-cols-1 p-7 gap-4">
                        <div class="entry-thumb portfolio-thumb ">
                            <div class="imgoverlay relative overflow-hidden rounded-2xl disabled:block text-light animate__animated wow animate__backInUp">
                                <a href="../../../../images/taylor.jpg" >
                                    <img class="h-96 pt-1.5" src="../../../../images/taylor.jpg"  alt="image">
                                    <div class="overlay"><span class="overlaycolor"></span><div class="overlayinfo" style="margin-top: -11px;"><h6>TaylorOtwall</h6></div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:grid-cols-2 p-7 gap-4">
                        <div class="entry-thumb portfolio-thumb">
                            <div class="imgoverlay text-light rounded-2xl animate__animated wow animate__backInUp">
                                <a href="../../../../images/way1.jpg">
                                    <img src="../../../../images/way1.jpg"  alt="image">
                                    <div class="overlay"><span class="overlaycolor"></span><div class="overlayinfo" style="margin-top: -11px;"><h6>Jeffrey Way</h6></div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:grid-cols-3 p-7 gap-4">
                        <div class="entry-thumb portfolio-thumb ">
                            <div class="imgoverlay text-light rounded-2xl animate__animated wow animate__backInUp">
                                <a href="../../../../images/caleb.jpg" >
                                    <img src="../../../../images/caleb.jpg" alt="image">
                                    <div class="overlay"><span class="overlaycolor"></span><div class="overlayinfo" style="margin-top: -11px;"><h6>Caleb Porzio</h6></div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:grid-cols-4 p-7 grid-rows-1 gap-4">
                        <div class="entry-thumb portfolio-thumb ">
                            <div class="imgoverlay text-light rounded-2xl animate__animated wow animate__backInUp">
                                <a href="../../../../images/rasmus%20.jpg" >
                                    <img src="../../../../images/rasmus%20.jpg" alt="image">
                                    <div class="overlay"><span class="overlaycolor"></span><div class="overlayinfo" style="margin-top: -11px;"><h6>Rasmus Lerdorf</h6></div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:grid-cols-5 p-7 gap-4">
                        <div class="entry-thumb portfolio-thumb">
                            <div class="imgoverlay text-light rounded-2xl animate__animated wow animate__backInUp">
                                <a href="../../../../images/adam.jpg" >
                                    <img class="w-80" src="../../../../images/adam.jpg"  alt="image">
                                    <div class="overlay"><span class="overlaycolor"></span><div class="overlayinfo" style="margin-top: -11px;"><h6>adam wathan</h6></div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="md:grid-cols-6 p-7 gap-4">
                        <div class="entry-thumb portfolio-thumb">
                            <div class="imgoverlay text-light rounded-2xl animate__animated wow animate__backInUp">
                                <a href="../../../../images/eich.jpg" >
                                    <img class="h-80 w-72" src="../../../../images/eich.jpg" alt="image">
                                    <div class="overlay"><span class="overlaycolor"></span><div class="overlayinfo" style="margin-top: -11px;"><h6>Eich</h6></div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<---counter--->--}}
        <div class="counter w-full xl:flex sm:flex bg-white">
            <div class="container flex mx-auto mt-8 py-4 px-4 sm:px-8 ">

                <div class="grid md:grid-cols-5  mx-auto items-center gap-10 text-center animate__animated wow animate__zoomInDown">
                    <div class="cell mr-2.5 md:grid-cols-1 ml-2.5 text-3xl">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="counter-info text-2xl">Happy Users</p>
                    </div>
                    <div class="cell text-3xl mr-2.5 ml-2.5 md:grid-cols-2 animate__animated wow animate_zoomInDown">
                        <span data-purecounter-start="0" data-purecounter-end="385" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="counter-info text-2xl">Issues Solved</p>
                    </div>
                    <div class="cell text-3xl mr-2.5 ml-2.5 md:grid-cols-3 animate__animated wow animate_zoomInDown">
                        <span data-purecounter-start="0" data-purecounter-end="159" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="counter-info text-2xl">Good Reviews</p>
                    </div>
                    <div class="cell text-3xl mr-2.5 ml-2.5 md:grid-cols-4 animate__animated wow animate_zoomInDown">
                        <span data-purecounter-start="0" data-purecounter-end="127" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="counter-info text-2xl">Case Studies</p>
                    </div>
                    <div class="cell text-3xl mr-2.5 ml-2.5 md:grid-cols-5 animate__animated wow animate_zoomInDown">
                        <span data-purecounter-start="0" data-purecounter-end="333" data-purecounter-duration="1" class="purecounter"></span>
                        <p class="counter-info text-2xl">Orders Received</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

