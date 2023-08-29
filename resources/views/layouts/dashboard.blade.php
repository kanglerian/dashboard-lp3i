<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Politeknik LP3I Kampus Tasikmalaya</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>

<body class="bg-gray-50">
    @include('components.navbar')

    <section class="container mx-auto px-4 py-3">
        <div class="space-y-1">
            @include('components.navbar-horizontal')
            @yield('content')
        </div>
    </section>

    <footer class="mt-5 bg-white">
        <div class="container mx-auto px-4 py-8">
            <div class="flex md:flex-row flex-col justify-between gap-5">
                <div>
                    <img loading="lazy" src="{{ asset('') }}public/img/lp3i.svg" alt="" class="w-52">
                    <a role="button" target="_blank" href="https://goo.gl/maps/1dxJCzGBDvgNje8cA"
                        class="block text-sm text-gray-700 my-3">Jl. Ir. H. Juanda No.106, Panglayungan, Kec.
                        Cipedes<br>Kota Tasikmalaya, Jawa Barat 46151</a>
                    <div class="flex gap-4 justify-start text-gray-600">
                        <a target="_blank" href="https://www.facebook.com/lp3itasik"><i
                                class="fa-brands fa-facebook-f fa-2x"></i></a>
                        <a target="_blank" href="https://www.instagram.com/lp3i.tasik/"><i
                                class="fa-brands fa-instagram fa-2x"></i></a>
                        <a target="_blank" href="https://www.youtube.com/channel/UCX7vz8wEj4lHlVSbpYwC_nQ"><i
                                class="fa-brands fa-youtube fa-2x"></i></a>
                        <a target="_blank" href="https://www.tiktok.com/@lp3i.tasik"><i
                                class="fa-brands fa-tiktok fa-2x"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="text-gray-700 font-bold text-left md:text-right text-xl">Layanan</h5>
                    <ul class="text-gray-500 mt-4 text-xs text-left md:text-right space-y-2">
                        <li><a href="#">Akademik</a></li>
                        <li><a href="#">Career Center</a></li>
                        <li><a href="#">Sistem Akademik (SIAKAD)</a></li>
                        <li><a href="#">Learning Management System (LMS)</a></li>
                        <li><a href="https://schoolarship.politekniklp3i-tasikmalaya.ac.id/" role="button"
                                target="_blank">Cek Beasiswa</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-gray-700 font-bold text-left md:text-right text-xl">Tentang Kampus</h5>
                    <ul class="text-gray-500 mt-4 text-xs text-left md:text-right space-y-2">
                        <li><a href="#">Brosur Digital</a></li>
                        <li><a href="#">Mengenal LP3I</a></li>
                        <li><a href="#">Sejarah LP3I</a></li>
                        <li><a href="#">Visi & Misi</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Fasilitas Kampus</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-gray-700 font-bold text-left md:text-right text-xl">Organisasi Mahasiswa</h5>
                    <ul class="text-gray-500 mt-4 text-xs text-left md:text-right space-y-2">
                        <li><a href="#">Badan Eksekutif Mahasiswa</a></li>
                        <li><a href="#">Himpunan Mahasiswa Manajemen Keuangan Perbankan</a></li>
                        <li><a href="#">Himpunan Mahasiswa Manajemen Pemasaran</a></li>
                        <li><a href="#">Unit Kegiatan Mahasiswa LP3I Sport Club</a></li>
                        <li><a href="#">Unit Kegiatan Mahasiswa LP3I Computer Club</a></li>
                        <li><a href="#">Unit Kegiatan Mahasiswa LP3I Moslem Association</a></li>
                        <li><a href="#">Unit Kegiatan Mahasiswa LP3I Innovation Art Club</a></li>
                        <li><a href="#">Unit Kegiatan Mahasiswa Student English Association of LP3I</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="bg-white text-gray-400 text-xs text-center py-3">
            <p>Copyright © 2023 Politeknik LP3I Kampus Tasikmalaya</p>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/lottie-player.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/viewer-static.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                center: true,
                items: 3,
                loop: true,
                margin: 20,
                dots: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(() => {
            $('#btnAside').click(() => {

                $('#aside').animate({
                    width: 'toggle',
                    opacity: 'toggle'
                }, "easeinout");
            });
        });
    </script>


    <script>
        $(document).ready(() => {
            $('#navbarMenu').click(() => {
                let status = $('#navbar-dropdown').attr('data-attribute');
                $('#navbar-dropdown').animate({
                    height: "toggle",
                    opacity: "toggle"
                }, "easeinout", () => {
                    $('#navbar-dropdown').attr('data-attribute', status == '0' ? '1' : '0');
                });
            });
        });
    </script>

    <script>
        const copyLinkAPI = (content) => {
            const linkAPI = content;
            const textarea = document.createElement("textarea");
            textarea.value = `{{ route('/') }}${linkAPI}`;
            textarea.style.position = "fixed";
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            alert('Link sudah disalin!');
        }
    </script>

</body>

</html>
