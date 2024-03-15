<script src="https://cdn.tailwindcss.com"></script>
<div class="loading w-full flex justify-center h-auto object-cover bg-white-100">
    <div class="w-full rounded h-full">

        {{--    <---Home--->--}}
        <header id="header" class="header py-20 text-center md:pt-36 xl:flex">
            <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
            />
            <div class="w-full">
                <div class="xl:container  mx-auto flex flex-row py-20 bg-white">
                    <div class="w-full p-5 animate__animated wow animate__fadeInDown ">
                        <h1 class="pt-20 mb-5 font-extrabold text-3xl">Team management Our application</h1>
                        <p class="mb-8 font-light text-2xl ">Start getting things done together with your team based on CODEXSUN revolutionary team management features</p>
                        <a class="btn-solid-lg hover:bg-emerald-400 rounded gap-3 bordered bg-gray-400 border-gray-500 p-3" href="{{ route('register') }}"><i class="fab fa-apple border-gray-500 hover:underline hover:bg-blue-500 "></i>register</a>
                    </div>
                    <div class="w-full flex mx-auto animate__animated wow animate__bounceInRight bg-gradient-to-r from-white to-gray-50">
                        <img class="h-auto  rounded ms-auto inline max-w-2xl" src="../../../../images/img9.jpg" alt="image description">
                    </div>
                </div>
            </div>
        </header>

        <div class="pt-4 pb-14 text-center font-sans animate__animated wow animate__bounce bg-gray-100">
            <div class="container px-4 sm:px-8 xl:px-4 justify-items-center mx-auto  animate__animated animate__backInUp">
                <p class="mb-4 text-gray-800 text-3xl leading-10 lg:max-w-5xl lg:mx-auto"> Team management mobile apps don’t get better than CODEXSUN. It’s probably the best app in the world for this purpose. Don’t hesitate to give it a try today, and you will fall in love with it</p>
            </div>
        </div>
        {{--<---services--->--}}
        <section href="{{ route('service') }}">
            <div class="w-full bg-gray-100">
                <div id="services" class="container  mx-auto xl:flex  md:flex-row  sm:flex-row sm:gap-3 pt-4 pb-1.5  text-center bg-gray-100">
                    <div class=" justify-items-center grid md:grid-cols-3 p-3 gap-3 w-full mx-auto">

                        <div class="mb-3.5 lg:grid-cols-1 w-72 h-80 shadow-2xl grid-rows-1 gap-4 border rounded-2xl bg-white  animate__animated wow animate__fadeInLeftBig ">
                            <div class="mb-5">
                                <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-1.svg" alt="alternative" />
                            </div>
                            <div class="card-body mx-auto">
                                <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Platform Integration</h5>
                                <p class="mb-5 font-medium">Your sales force can use the app on any smartphone platform without compatibility issues</p>
                            </div>
                        </div>

                        <div class="mb-3.5 w-72 h-80 shadow-2xl grid-rows-2 border lg:grid-cols-2 rounded-2xl bg-white  animate__animated wow animate__fadeInDownBig" >
                            <div class="mb-1.5">
                                <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-2.svg" alt="alternative" />
                            </div>
                            <div class="card-body mx-auto">
                                <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Easy On Resources</h5>
                                <p class="mb-5 font-medium">Works smoothly even on older generation hardware due to our optimization efforts</p>
                            </div>
                        </div>

                        <div class="mb-3.5 w-72 h-80 border shadow-2xl grid-rows-3 lg:grid-cols-3 rounded-2xl bg-white  animate__animated wow animate__fadeInRightBig">
                            <div class=" mb-1.5">
                                <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-3.svg" alt="alternative" />
                            </div>
                            <div class="card-body mx-auto">
                                <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Great Performance</h5>
                                <p class="mb-4 font-medium">Optimized code and innovative technology insure no delays and ultra-fast responsiveness</p>
                            </div>
                        </div>

                        <!-- Card -->
                        <div class="mb-3.5 border w-72 h-80 shadow-2xl grid-rows-4 rounded-2xl lg:grid-cols-4 bg-white  animate__animated wow animate__fadeInBottomLeft">
                            <div class=" mb-1.5">
                                <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-4.svg" alt="alternative" />
                            </div>
                            <div class="card-body mx-auto">
                                <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Multiple Languages</h5>
                                <p class="mb-4 font-medium">Choose from one of the 40 languages that come pre-installed and start selling smarter</p>
                            </div>
                        </div>
                        <div class="mb-3.5 border w-72 h-80 shadow-2xl grid-rows-5 rounded-2xl lg:grid-cols-5 bg-white  animate__animated wow animate__fadeInUpBig">
                            <div class=" mb-1.5">
                                <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-5.svg" alt="alternative" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Free Updates</h5>
                                <p class="mb-4 font-medium">Don't worry about future costs, pay once and receive all future updates at no extra cost</p>
                            </div>
                        </div>

                        <div class="mb-3.5 border w-72 h-80 shadow-2xl grid-rows-6 lg:grid-cols-6 rounded-2xl bg-white  animate__animated wow animate__backInUp">
                            <div class="mb-1.5">
                                <img class="w-16 h-16 mr-auto mt-10 ml-auto" src="../../../../images/features-icon-6.svg" alt="alternative" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-7 font-Italic font-bold text-2xl">Community Support</h5>
                                <p class="mb-4 font-medium">Register the app and get acces to knowledge and ideas from the Pavo online community</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<---pricing--->--}}
            <div id="pricing" class="cards-2 relative pt-8 text-center mx-auto bg-white">
                <div class="absolute bottom-0.5 h-40 w-full"></div>
                {{--        <div class="">--}}
                <h2 class="mb-2.5 font-semibold grid-rows-1 lg:max-w-xl p-3 lg:mx-auto text-2xl">Pricing options for all budgets</h2>
                <p class="mb-16 lg:max-w-3xl grid-rows-2 p-3 lg:mx-auto text-2xl"> Our pricing plans are set up in such a way that any user can start enjoying Pavo without worrying so much about costs. They are flexible and work for any type of industry </p>

                {{--           <---items--->--}}
                <div class="container md:grid-cols-3 flex px-4 pb-px p-5 mx-auto gap-3.5">
                    <div class="card relative block rounded  w-80 h-auto md:grid-cols-4 gap-3 flex-col mr-auto mb-6 ml-auto mx-auto shadow-md">
                        <div class="card-body p-8 bg-gray-50 animate__animated wow animate__zoomIn">
                            <div class="card-title mb-1.5 text-blue-500 font-bold text-center">STANDARD</div>
                            <div class="price"><span class="currency mr-1.5 text-amber-800 font-light ">$</span><span class="value text-gray-700 font-medium h-5 text-center">13999</span></div>
                            <div class="frequency mb-1.5 font-semibold text-center">monthly</div>
                            <p class="mb-1.5 text-left">This basic package covers the marketing needs of small startups</p>
                            <ul class="list mb-7 space-y-2 text-left">
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="blue-900" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                    <div>List building and relations</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Seamless platform integration</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Great performance on devices</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Community support and videos</div>
                                </li>
                            </ul>
                            <div class="button-wrapper absolute pb-1.5 text-center ml-16">
                                <a class="border rounded-2xl p-2 flex gap-1.5 bg-cyan-200  text-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 0 1 .652 0l7.25 3.5A.75.75 0 0 1 17 6.957V16.5h.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H3V6.957a.75.75 0 0 1-.576-1.382l7.25-3.5ZM11 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7.5 9.75a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="card relative block w-80 h-auto md:grid-cols-5 gap-3 mr-auto mx-auto mb-6 ml-auto border rounded shadow-md">
                        <div class="card-body p-8 bg-gray-50 animate__animated wow animate__zoomIn">
                            <div class="card-title mb-1.5 text-blue-500 font-bold text-center">ADVANCED</div>
                            <div class="price"><span class="currency mr-1.5 text-amber-800 font-light">$</span><span class="value text-gray-700 font-medium h-5 text-center">25999</span></div>
                            <div class="frequency mb-1.5 font-semibold text-center">monthly</div>
                            <p class="mb-1.5 text-left">This is a more advanced package suited for medium companies</p>
                            <ul class="list mb-7 space-y-2 text-left">
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>List building and relations</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Seamless platform integration</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Great performance on devices</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Community support and videos</div>
                                </li>
                            </ul>
                            <div class="button-wrapper absolute pb-1.5 justify-items-center mx-auto ml-16 ">
                                <a class="border rounded-2xl p-2 bg-cyan-200 gap-1.5 flex  text-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 0 1 .652 0l7.25 3.5A.75.75 0 0 1 17 6.957V16.5h.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H3V6.957a.75.75 0 0 1-.576-1.382l7.25-3.5ZM11 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7.5 9.75a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Z" clip-rule="evenodd" />
                                    </svg>Buy Now</a>
                            </div>
                        </div>
                    </div>

                    <div class=" relative block   w-80 h-auto mr-auto grid-cols-6 gap-3 mb-6 ml-auto mx-auto border rounded shadow-md">
                        <div id="progress" class="card-body p-8 bg-gray-50 animate__animated wow animate__zoomIn">
                            <div class="card-title mb-1.5 text-blue-500 font-bold text-center">PREMIUM</div>
                            <div class="price"><span class="currency mr-1.5 text-amber-800 font-light">$</span><span class="value text-gray-700 font-medium h-5 text-center">35999</span></div>
                            <div class="frequency mb-1.5 font-semibold text-center">monthly</div>
                            <p class="mb-3 text-left">This is a comprehensive package designed for big organizations</p>
                            <ul class="list mb-7 text-left space-y-2">
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>List building and relations</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Seamless platform integration</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>

                                    <div>Great performance on devices</div>
                                </li>
                                <li class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                    <div>Community support and videos</div>
                                </li>
                            </ul>
                            <div class="button-wrapper absolute pb-1.5 text-center ml-16">
                                <a class="border rounded-2xl p-2 gap-1.5 flex bg-cyan-200" href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M9.674 2.075a.75.75 0 0 1 .652 0l7.25 3.5A.75.75 0 0 1 17 6.957V16.5h.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H3V6.957a.75.75 0 0 1-.576-1.382l7.25-3.5ZM11 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7.5 9.75a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Zm3.25 0a.75.75 0 0 0-1.5 0v5.5a.75.75 0 0 0 1.5 0v-5.5Z" clip-rule="evenodd" />
                                    </svg>
                                    Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--<--- Our Team ---->--}}
        <section href="{{ route('about') }}">
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
        {{--<----contact---->--}}
        <section href="{{ route('contact') }}">
            <div class="contact  relative mx-auto justify-items-center h-full p-10 bg-gray-50" id="contact">
                <div class="container justify-items-center mx-auto ">
                    <div class="section-header  justify-items-center animate__animated wow animate__fadeInTopLeft">
                        <h3 class="text-center font-sans font-bold text-3xl">Contact Us</h3>
                        <p class="text-center font-medium p-3">
                            Making your business vision come true with our deep operational & implementation expertise.
                            We've got the solutions to take your business to the next level.            </p>
                    </div>
                </div>
                <div class="row justify-items-center w-full mx-auto p-3 grid md:grid-cols-2 ">
                    <div class="md:grid-cols-1 w-auto grid-rows-1 h-auto mx-auto p-3 animate__animated wow animate__fadeInLeftBig ">
                        <div class="form">
                            <form action="" method="get">
                                <div class="form-row">
                                    <div class="form-group col-md-6 md:p-3.5">
                                        <label>
                                            <input type="text" class="form-control  md:w-72" placeholder="Your Name" />
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6 md:p-3.5">
                                        <label>
                                            <input type="email" class="form-control mx-auto md:w-72" placeholder="Your Email" />
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group md:p-3.5">
                                    <label>
                                        <input type="text" class="form-control mx-auto md:w-72" placeholder="Subject" />
                                    </label>
                                </div>
                                <div class="form-group md:p-3.5">
                                    <label>
                                        <textarea class="form-control mx-auto md:w-72" rows="5" placeholder="Message"></textarea>
                                    </label>
                                </div>
                                <div class="p-3 self-center flex-1 text-center">
                                    <button id="msg" type="Send message" class="bg-indigo-400 shadow-xl hover:bg-indigo-500 text-white font-bold rounded-full p-4 mx-auto md:w-60">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class=" w-full h-full md:w-auto md:h-auto p-5 justify-items-center mx-auto animate__animated wow animate__fadeInRightBig">
                        <div class="contact-info md:grid-cols-2  md:h-full md:w-full p-5 grid-rows-2">
                            <div class="h-full bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                                <iframe width="100%" height="100%" class="absolute inset-0"  title="map"    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d411.4922916291721!2d77.34064677816176!3d11.128529397090245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1690604229895!5m2!1sen!2sin" loading="lazy" style="filter: grayscale(1) contrast(1.2) opacity(0.4);">
                                </iframe>
                                <div class="bg-white relative flex flex-wrap py-6 mx-auto rounded shadow-md">
                                    <div class="lg:w-1/2  px-6">
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                                        <p class="mt-1">10-A Venkatappa Gounder Street </p>
                                    </div>
                                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                                        <a class="text-indigo-500 leading-relaxed">aaranassociates@email.com</a>
                                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                                        <p class="leading-relaxed">+91 9655227738</p>
                                        <div class="social">
                                            <a href=""><svg fill="#000000" height="20px" width="20px"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_834_"> <path id="XMLID_835_" d="M81.703,165.106h33.981V305c0,2.762,2.238,5,5,5h57.616c2.762,0,5-2.238,5-5V165.765h39.064 c2.54,0,4.677-1.906,4.967-4.429l5.933-51.502c0.163-1.417-0.286-2.836-1.234-3.899c-0.949-1.064-2.307-1.673-3.732-1.673h-44.996 V71.978c0-9.732,5.24-14.667,15.576-14.667c1.473,0,29.42,0,29.42,0c2.762,0,5-2.239,5-5V5.037c0-2.762-2.238-5-5-5h-40.545 C187.467,0.023,186.832,0,185.896,0c-7.035,0-31.488,1.381-50.804,19.151c-21.402,19.692-18.427,43.27-17.716,47.358v37.752H81.703 c-2.762,0-5,2.238-5,5v50.844C76.703,162.867,78.941,165.106,81.703,165.106z"></path></g></g></svg></a>
                                            <a href=""><svg fill="#000000" height="20px" width="20px"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 315 315" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_510_"> <path id="XMLID_511_" d="M307.5,136.892h-19.791V117.1c0-4.143-3.357-7.5-7.5-7.5h-26.717c-4.143,0-7.5,3.357-7.5,7.5v19.792 h-19.791c-4.143,0-7.5,3.357-7.5,7.5v26.717c0,4.143,3.357,7.5,7.5,7.5h19.791v19.792c0,4.142,3.357,7.5,7.5,7.5h26.717 c4.143,0,7.5-3.358,7.5-7.5v-19.792H307.5c4.143,0,7.5-3.357,7.5-7.5v-26.717C315,140.249,311.643,136.892,307.5,136.892z"></path> <path id="XMLID_512_" d="M101.906,104.16c9.088,0,17.823,2.45,25.274,7.087l8.513,5.825c2.967,2.03,6.958,1.671,9.514-0.861 l24.828-24.596c1.589-1.574,2.392-3.774,2.191-6.001c-0.2-2.227-1.384-4.248-3.228-5.513l-14.43-9.896 c-0.294-0.201-0.603-0.382-0.922-0.539l-13.979-6.902c-0.185-0.092-0.374-0.176-0.566-0.252 c-12.042-4.754-24.729-7.165-37.708-7.165c-26.757,0-51.996,10.27-71.068,28.915c-19.367,18.934-30.137,44.681-30.323,72.499 c-0.187,27.824,10.239,53.72,29.355,72.916c18.968,19.049,45.879,29.975,73.834,29.975c27.658,0,53.608-10.739,71.195-29.463 c13.931-14.831,22.48-34.641,24.727-57.288c0.021-0.215,0.034-0.43,0.036-0.645l0.26-20.345c0.006-0.421-0.024-0.841-0.09-1.257 l-1.09-6.953c-0.571-3.649-3.716-6.339-7.409-6.339h-86.672c-4.143,0-7.5,3.358-7.5,7.5v29.982c0,4.142,3.357,7.5,7.5,7.5h44.186 c-2.025,4.439-5.216,9.12-9.251,13.482c-8.801,9.518-21.926,14.977-36.01,14.977c-14.383,0-28.157-5.636-37.79-15.462 c-20.052-20.448-19.822-56.077,0.489-76.245C75.334,109.605,88.505,104.16,101.906,104.16z"></path></g></g></svg></a>
                                            <a href=""><svg fill="#000000" height="20px" width="20px"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_826_"> <path id="XMLID_827_" d="M302.973,57.388c-4.87,2.16-9.877,3.983-14.993,5.463c6.057-6.85,10.675-14.91,13.494-23.73 c0.632-1.977-0.023-4.141-1.648-5.434c-1.623-1.294-3.878-1.449-5.665-0.39c-10.865,6.444-22.587,11.075-34.878,13.783 c-12.381-12.098-29.197-18.983-46.581-18.983c-36.695,0-66.549,29.853-66.549,66.547c0,2.89,0.183,5.764,0.545,8.598 C101.163,99.244,58.83,76.863,29.76,41.204c-1.036-1.271-2.632-1.956-4.266-1.825c-1.635,0.128-3.104,1.05-3.93,2.467 c-5.896,10.117-9.013,21.688-9.013,33.461c0,16.035,5.725,31.249,15.838,43.137c-3.075-1.065-6.059-2.396-8.907-3.977 c-1.529-0.851-3.395-0.838-4.914,0.033c-1.52,0.871-2.473,2.473-2.513,4.224c-0.007,0.295-0.007,0.59-0.007,0.889 c0,23.935,12.882,45.484,32.577,57.229c-1.692-0.169-3.383-0.414-5.063-0.735c-1.732-0.331-3.513,0.276-4.681,1.597 c-1.17,1.32-1.557,3.16-1.018,4.84c7.29,22.76,26.059,39.501,48.749,44.605c-18.819,11.787-40.34,17.961-62.932,17.961 c-4.714,0-9.455-0.277-14.095-0.826c-2.305-0.274-4.509,1.087-5.294,3.279c-0.785,2.193,0.047,4.638,2.008,5.895 c29.023,18.609,62.582,28.445,97.047,28.445c67.754,0,110.139-31.95,133.764-58.753c29.46-33.421,46.356-77.658,46.356-121.367 c0-1.826-0.028-3.67-0.084-5.508c11.623-8.757,21.63-19.355,29.773-31.536c1.237-1.85,1.103-4.295-0.33-5.998 C307.394,57.037,305.009,56.486,302.973,57.388z"></path></g></g></svg></a>
                                            <a href=""><svg fill="#000000" height="20px" width="20px"  id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 310 310" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_801_"> <path id="XMLID_802_" d="M72.16,99.73H9.927c-2.762,0-5,2.239-5,5v199.928c0,2.762,2.238,5,5,5H72.16c2.762,0,5-2.238,5-5V104.73 C77.16,101.969,74.922,99.73,72.16,99.73z"></path> <path id="XMLID_803_" d="M41.066,0.341C18.422,0.341,0,18.743,0,41.362C0,63.991,18.422,82.4,41.066,82.4 c22.626,0,41.033-18.41,41.033-41.038C82.1,18.743,63.692,0.341,41.066,0.341z"></path> <path id="XMLID_804_" d="M230.454,94.761c-24.995,0-43.472,10.745-54.679,22.954V104.73c0-2.761-2.238-5-5-5h-59.599 c-2.762,0-5,2.239-5,5v199.928c0,2.762,2.238,5,5,5h62.097c2.762,0,5-2.238,5-5v-98.918c0-33.333,9.054-46.319,32.29-46.319 c25.306,0,27.317,20.818,27.317,48.034v97.204c0,2.762,2.238,5,5,5H305c2.762,0,5-2.238,5-5V194.995 C310,145.43,300.549,94.761,230.454,94.761z"></path> </g> </g></svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section id="last ">
                <div class="footer-newsletter mx-auto justify-items-center">
                    <div class="container mx-auto justify-items-center">
                        <div class="row mx-auto justify-items-center ml-32 flex p-10">
                            <div class="col-lg-6">
                                <h4>Join Our Newsletter</h4>
                                <p> Making your business vision come true with our deep operational & implementation expertise.
                                    We've got the solutions to take your business to the next level</p>
                                <form class="w-full" action="" method="post">
                                    <input class="w-3/4 ml-20 p-2 focus:border-none rounded-3xl" type="email" name="email">
                                    <input class="rounded-3xl  border-gray-900 absolute bg-blue-400 mr-40" type="submit" value="Subscribe">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-top">
                    <div class="container mx-auto justify-items-center">
                        <div class="row grid grid-cols-4 ">

                            <div class="grid-cols-1 footer-contact">
                                <h3>Aaran Soft</h3>
                                <p>
                                    10-A Venkatappa Gounder Street<br>
                                    Tiruppur,-641654.<br>
                                    TamilNadu <br><br>
                                    <strong>Phone:</strong>+91 9655227738<br>
                                    <strong>Email:</strong> aaranassociates@email.com<br>
                                </p>
                            </div>

                            <div class="grid-cols-2 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Home</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">About us</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Services</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Terms of service</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Privacy policy</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="grid-cols-3  footer-links">
                                <h4>Our Services</h4>
                                <ul>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Web Development</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Product Management</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Marketing</a>
                                    </li>
                                    <li><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                        </svg>
                                        <a href="#">Graphic Design</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="grid-cols-4  footer-links">
                                <h4>Our Social Networks</h4>
                                <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                                <div class="social-links mt-3">
                                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <div class="w-full bg-gray-300 ">
                <div class="container xl:flex sm:flex  w-full h-auto px-5 py-6 mx-auto flex items-center sm:flex-row flex-col bg-gray-300 ">
                    <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                        </svg>
                        <span class="ml-3 text-xl">AARAN SOFT</span>
                    </a>
                    <p class="text-sm text-gray-500 sm:ml-6 sm:mt-0 mt-4">© 2023 Sundar —
                        <a href="https://twitter.com/knyttneve" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@aaransoftwares@gmail.com</a>
                    </p>
                </div>
            </div>
        </section>
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
