<aside id="aside" class="flex-2 z-[1] md:m-0 rounded-lg md:static md:block text-sm hidden">
    <ul class="w-full text-sm font-medium space-y-2 text-gray-700 border p-3 border-gray-200 rounded-lg mb-4">
        @if (Auth::user()->role == 'admin')
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('flyer.index') }}"><i class="fa-solid fa-image mr-1"></i> Flyer</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('banner.index') }}"><i class="fa-solid fa-rectangle-ad mr-1"></i> Spanduk</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('benefit.index') }}"><i class="fa-solid fa-circle-check mr-1"></i> Keuntungan</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('company.index') }}"><i class="fa-solid fa-building mr-1"></i> Perusahaan Relasi</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('information.index') }}"><i class="fa-solid fa-bullhorn mr-1"></i> Informasi</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('organization.index') }}"><i class="fa-solid fa-sitemap mr-1"></i> Struktur
                    Organisasi</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('facility.index') }}"><i class="fa-solid fa-map-location-dot mr-1"></i>
                    Fasilitas
                    Kampus</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('documentation.index') }}"><i class="fa-regular fa-images mr-1"></i>
                    Dokumentasi</a>
            </li>

            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('agenda.index') }}"><i class="fa-regular fa-calendar-days mr-1"></i> Agenda</a>
            </li>

            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('media.index') }}"><i class="fa-solid fa-newspaper mr-1"></i> Media</a>
            </li>

            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('program.index') }}"><i class="fa-solid fa-school mr-1"></i> Program Studi</a>
            </li>

            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('programalumni.index') }}"><i class="fa-solid fa-comments mr-1"></i> Testimonial</a>
            </li>

            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('ormawa.index') }}"><i class="fa-solid fa-sitemap mr-1"></i> Organisasi
                    Mahasiswa</a>
            </li>
        @endif

        <li
            class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
            <a href="{{ route('article.index') }}"><i class="fa-solid fa-newspaper mr-1"></i> Artikel</a>
        </li>

        @if (Auth::user()->role == 'uppm')
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('panduanuppm.index') }}"><i class="fa-solid fa-book mr-1"></i> Panduan</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('bookchapter.index') }}"><i class="fa-solid fa-book mr-1"></i> Book Chapter</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('datapenelitianuppm.index') }}"><i class="fa-solid fa-database mr-1"></i> Data Penelitian</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('datapkmuppm.index') }}"><i class="fa-solid fa-database mr-1"></i> Data PKM</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('luaranpenelitianuppm.index') }}"><i class="fa-solid fa-up-right-from-square"></i> Luaran Penelitian</a>
            </li>
            <li
                class="w-full px-4 py-2 bg-white hover:text-white hover:bg-cyan-800 transition ease-in-out border md:border-none border-gray-200 rounded-lg">
                <a href="{{ route('luaranpkmuppm.index') }}"><i class="fa-solid fa-up-right-from-square"></i> Luaran PKM</a>
            </li>
        @endif
    </ul>
</aside>
