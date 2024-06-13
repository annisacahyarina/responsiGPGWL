<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <!-- CSS -->
    <style>
        .center-text {
            text-align: center;
        }

        .size {
            size: 7pt;
        }
    </style>

    <!-- Leaflet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- container -->
    <div class="container py-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5> <b> Selamat datang di BeachBuddy! </h5> </b> <br>

                        <p> Panduan utama Anda untuk menemukan dan menjelajahi beach club
                            terbaik di Bali! Di sini, kami menyediakan informasi lengkap dan terkini tentang persebaran
                            beach club di seluruh penjuru Pulau Dewata. BeachBuddy memudahkan Anda menemukan spot terbaik untuk bersantai, berpesta, atau menikmati
                            matahari terbenam yang memukau. Temukan rekomendasi tempat-tempat eksklusif mulai dari
                            pantai Kuta yang ramai hingga pantai tersembunyi di Uluwatu.

                           <p> Setiap beach club yang kami ulas dilengkapi dengan deskripsi mendetail, foto-foto menawan,
                            dan ulasan dari pengunjung. Nikmati kemudahan navigasi dengan peta interaktif kami yang
                            menunjukkan lokasi-lokasi beach club terpopuler. Jadikan BeachBuddy teman setia Anda dalam menjelajahi keindahan dan kemewahan beach club di
                            Bali. Temukan tempat favorit Anda untuk menikmati musik, makanan lezat, dan pemandangan laut
                            yang spektakuler. Ayo, mulai petualangan pantai Anda bersama BeachBuddy sekarang!</p>
                    </div>
                </div>
            </div>
        </div>
    <div class="container py-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Jumlah Beach Club</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">

                        <div class="alert alert-primary" role="alert">
                            <h4><i class="fa-solid fa-location-dot"></i> Total</h4>
                            <p style="font-size:  32pt">{{ $total_points }}</p>
                        </div>
                    </div>

                    <!--<div class="col">
                    <div class="alert alert-warning" role="alert">
                        <h4><i class="fa-solid fa-route"></i> Total Polylines</h4>
                        <p style="font-size:  32pt">{{ $total_polylines }}</p>
                      </div>
                </div>
                <div class="col">
                    <div class="alert alert-info" role="alert">
                        <h4><i class="fa-solid fa-draw-polygon"></i> Total Polygons</h4>
                        <p style="font-size:  32pt">{{ $total_polygons }}</p>
                      </div>
                </div>
            </div> -->

                    <hr>
                    <br>
                    <p>Anda login sebagai <b>{{ Auth::user()->name }}</b> dengan email <i>{{ Auth::user()->email }}</i>
                    </p>
                </div>
            </div>
        </div>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Bootstrap Bundle JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

        @include('components.toast')

</x-app-layout>
