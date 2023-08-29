<nav class="bg-lp3i-400 text-white text-xs py-3">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-2">
                <a href="https://politekniklp3i-tasikmalaya.ac.id/" target="_blank">
                    <img loading="lazy" src="{{ asset('img/lp3i-white.svg') }}" class="h-14">
                </a>
            </div>
            <div class="flex gap-3">
                @auth
                    <span role="button"><i class="fa-solid fa-circle-user"></i> {{ Auth::user()->name }}</span>
                    |
                    <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
