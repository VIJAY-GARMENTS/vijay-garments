<nav class="w-auto sticky inset-0 z-10 border-b-2 py-5 bg-gray-100">
    <div class="container w-full flex flex-wrap  rounded justify-between items-center mx-auto ">
        <a href="{{route('home')}}"  class="flex items-center lg:w-auto">
            <div class="p-1 lg:p-3 rounded py-2 ">
                <x-assets.logo.cxlogo :icon="'light'"  class="h-7 ml-4 mx-auto w-auto  block"/>
            </div>
{{--            <x-assets.logo.cxlogo--}}
            <span
                class="self-center text-3xl font-semibold whitespace-nowrap px-2 tracking-wider">CODEXSUN</span>
        </a>
        <div class="h-80 p-5 static  lg:flex-grow lg:h-16 lg:items-center lg:grid-cols-2">
            <ul class="gap-2 mx-auto lg:ml-60  lg:h-7 grid grid-rows-5 lg:flex-col lg:grid-cols-5 flex-row">
                <li>
                    <a class="hover:underline font-serif text-2xl p-2 grid-rows-1 lg:p-3 lg:grid-cols-1" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li>
                    <a class="hover:underline text-2xl p-2 grid-rows-2 font-serif lg:p-3 lg:grid-cols-2" href="{{route('service')}}">services</a>
                </li>
                <li>
                    <a class="hover:underline text-2xl p-2 grid-rows-3 font-serif lg:p-3 lg:grid-cols-3" href="{{route('about')}}">About Us</a>
                </li>
                <li>
                    <a class="hover:underline text-2xl p-2 grid-rows-4 font-serif lg:p-3 lg:grid-cols-4" href="{{route('contact')}}">Contact</a>
                </li>
                <li>
                    <a class="hover:underline text-2xl p-2 grid-rows-5 font-serif lg:p-3 lg:grid-cols-5" href="{{route('posts')}}">Blog</a>
                </li>
            </ul>
        </div>

        <div class="items-center lg:grid-cols-3">
            <div class="lg:top-0 lg:right-0 lg:mr-8 p-3">
                @if (Route::has('login'))
                    <div class="space-x-4">
                        @auth
                            <a href="{{route('dashboard')}}" role="button"
                               class="font-semibold text-xl hover:text-white hover:bg-green-600  px-3 py-1 rounded-xl focus:outline-none focus:underline  transition ease-in-out duration-150">
                                Dashboard
                            </a>

                            <a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="font-semibold text-xl hover:text-white hover:bg-red-600 px-3 py-1 rounded-xl
                                 focus:outline-none focus:underline transition ease-in-out duration-150"
                            >
                                Log out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        @else
                            <a href="{{ route('login') }}"
                               class="font-semibold text-xl hover:text-white hover:bg-blue-600 px-3 py-1 rounded-xl
                                   focus:outline-none focus:underline transition ease-in-out duration-150">
                                Log in
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{--    <script>--}}
{{--        $(window).on('load',function (){--}}
{{--            $(".container").fadeOut(1000);--}}
{{--            $(".loading").fadeIn(1000);--}}
{{--        });--}}
{{--    </script>--}}

</nav>
