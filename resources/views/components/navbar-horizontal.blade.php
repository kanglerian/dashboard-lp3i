<aside class="rounded-lg text-sm">
    <div
        class="w-full flex items-center gap-2 text-sm font-medium text-gray-700 border px-4 py-3 border-gray-200 rounded-lg overflow-x-auto">
        <a href="{{ route('banner.index') }}"
            class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
            <i class="fa-solid fa-rectangle-ad mr-1"></i>
            <span>Spanduk</span>
        </a>
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('flyer.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-image mr-1"></i>
                <span>Flyers</span>
            </a>
            <a href="{{ route('benefit.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-circle-check mr-1"></i>
                <span>Keuntungan</span>
            </a>
            <a href="{{ route('company.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-building mr-1"></i>
                <span class="text-nowrap">Perusahaan Relasi</span>
            </a>
            <a href="{{ route('information.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-bullhorn mr-1"></i>
                <span>Informasi</span>
            </a>
            <a href="{{ route('organization.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-sitemap mr-1"></i>
                <span>Struktur Organisasi</span>
            </a>
            <a href="{{ route('facility.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-map-location-dot mr-1"></i>
                <span>Fasilitas Kampus</span>
            </a>
            <a href="{{ route('documentation.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-regular fa-images mr-1"></i>
                <span>Dokumentasi</span>
            </a>

            <a href="{{ route('agenda.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-regular fa-calendar-days mr-1"></i>
                <span>Agenda</span>
            </a>

            <a href="{{ route('media.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-newspaper mr-1"></i>
                <span>Media</span>
            </a>

            <a href="{{ route('program.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-school mr-1"></i>
                <span>Program Studi</span>
            </a>

            <a href="{{ route('programalumni.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-comments mr-1"></i>
                <span>Testimonial</span>
            </a>

            <a href="{{ route('ormawa.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-sitemap mr-1"></i>
                <span>Organisasi Mahasiswa</span>
            </a>
        @endif

        <a href="{{ route('article.index') }}"
            class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
            <i class="fa-solid fa-newspaper mr-1"></i>
            <span>Artikel</span>
        </a>

        @if (Auth::user()->role == 'uppm')
            <a href="{{ route('panduanuppm.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-book mr-1"></i>
                <span>Panduan</span>
            </a>
            <a href="{{ route('bookchapter.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-book mr-1"></i>
                <span>Book Chapter</span>
            </a>
            <a href="{{ route('datapenelitianuppm.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-database mr-1"></i> Data
                <span>Penelitian</span>
            </a>
            <a href="{{ route('datapkmuppm.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-database mr-1"></i>
                <span>Data PKM</span>
            </a>
            <a href="{{ route('luaranpenelitianuppm.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-up-right-from-square"></i>
                <span> Luaran Penelitian</span>
            </a>
            <a href="{{ route('luaranpkmuppm.index') }}"
                class="w-full flex items-center gap-1 whitespace-nowrap px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <i class="fa-solid fa-up-right-from-square"></i>
                <span>Luaran PKM</span>
            </a>
        @endif
    </div>
</aside>
