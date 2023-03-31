<nav class="bg-cyan-700 text-white text-xs py-3">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <button id="dropdownNavbarLink" data-dropdown-toggle="language"
                    class="flex items-center justify-start w-auto py-2 text-white rounded">

                    <img src="{{ asset('flag/id.gif') }}" class="inline-block w-6 rounded mr-2">Indonesia

                    <i class="ml-2 fa-solid fa-chevron-down"></i></button>
                <div id="language" class="z-10 hidden font-normal bg-white rounded-lg shadow w-44">
                    <ul class="py-3 text-xs text-gray-700 px-4 space-y-2">
                        <li>
                            <a href="#Language/change/en"><img src="{{ asset('flag/en.gif') }}"
                                    class="inline-block w-10 rounded mr-2 shadow">English</a>
                        </li>
                        <li>
                            <a href="Language/change/id"><img src="{{ asset('flag/id.gif') }}"
                                    class="inline-block w-10 rounded mr-2 shadow">Indonesia</a>
                        </li>
                    </ul>
                </div>
                |
                <span class="hidden md:inline"><i class="fa-solid fa-phone"></i> (0265)311766</span>
                <a href="https://bit.ly/InfoPMBLP3ITasik" target="_blank"><i class="fa-brands fa-whatsapp"></i>
                    0813-1360-8558</a>
            </div>
            <div class="flex gap-3">
                @auth
                    <a href="#"><i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}</a>
                    |
                    <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
