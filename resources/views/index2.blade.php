<!DOCTYPE html>
<html lang="en">

<head>
    <title>Beach Buddy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.42.0/apexcharts.min.css"
        integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }

        img {
            padding: 5pt;
        }

        body {}
    </style>
</head>

<body>

    <!--navbar-->

    <nav class="navbar navbar-expand-lg" style="background-color: #BED7DC;">

        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}"><i class="fa-solid fa-umbrella-beach"></i>
                {{ $title }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index2') }}"><i
                                class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}"><i class="fa-solid fa-map"></i> Map</a>
                        {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-table"></i>
                       Table
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('table-point') }}">Table Point</a></li>
                      <li><a class="dropdown-item" href="{{ route('table-polyline')}}">Table Polyline</a></li>
                      <li><a class="dropdown-item" href="{{ route('table-polygon')}}">Table Polygon</a></li>
                    </ul>
                  </li> --}}

                        {{-- table --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('table-point') }}"><i class="fa-solid fa-table"></i> Find
                            More</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"><i
                                class="fa-solid fa-circle-info"></i> About</a>
                    </li>



                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i></i>
                                Dashboard</a>
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item">
                                <button class="nav-link text-danger" type="submit"><i
                                        class="fa-solid fa-right-to-bracket"></i> Logout
                                </button>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('login') }}"><i
                                    class="fa-solid fa-right-to-bracket"></i> Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
     <!-- Modal -->
     <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <b style="size: 15pt">Selamat datang di BeachBuddy,</b>
                    <br>
                    <br>
                    <p style="size: 15pt">Panduan utama Anda untuk menemukan dan menjelajahi beach club
                        terbaik di Bali! Di sini, kami menyediakan informasi lengkap dan terkini tentang persebaran
                        beach club di seluruh penjuru Pulau Dewata</p>
                        <br>
                        <br>
                    <p class="center-text" class="size">- Annisa Cahyarina - 22/97707/SV/21154 -</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-4 p-5 text-white rounded" style="background-color: #6096B4;">
        <h1 style="text-align: center;">BeachBuddy</h1>
        <p style="text-align: center;" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Temukan Surga Pantai di Bali!</p>
    </div>

    <img src="{{ Storage::url('images/gambar1.jpeg') }}" class="object-fit-contain border rounded" alt="..."
        style="height: 200px;  margin-left: 55px; margin-top: 10px;">
    <img src="{{ Storage::url('images/gambar2.jpeg') }}" class="object-fit-contain border rounded" alt="..."
        style="height: 200px; margin-top: 10px;">
    <img src="{{ Storage::url('images/gambar3.jpg') }}" class="object-fit-contain border rounded" alt="..."
        style="height: 200px; margin-top: 10px;">
    <img src="{{ Storage::url('images/1718280301_point.png') }}" class="object-fit-contain border rounded"
        alt="..." style="height: 200px; margin-top: 10px;">


    <br>
    <br>
    <div class="container mt-2">

        <div class="card-body">

            <p style="text-align: center;">
                Beach Buddy adalah panduan utama Anda untuk menjelajahi beach club terbaik di Bali. Nikmati keindahan
                pulau dewata dengan pengalaman tak terlupakan di berbagai beach club yang tersebar dari Kuta hingga
                Uluwatu.
            </p>


        </div>
    </div>
    </div>

    <!--strecthed link-->

    <hr>
    <br>
    <div class="container mt-1">
        <div class="row g-4 bg-body-tertiary position-relative">
            <div class="container mt-2">
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Tips & Trick Foto Bagus di Bali </h3>
                        <p style="margin-top: 7px;">Setiap sudut Bali menawarkan kesempatan untuk mengambil foto yang
                            spektakuler
                        </p>
                        <a href="https://www.lemon8-app.com/doraerlina/7201320839709491713?region=id"
                            class="btn btn-primary" style="margin-top: 7px;">Lihat disini!</a>
                    </div>
                    <div class="col-sm-4">
                        <h3>Oleh - oleh khas Bali</h3>
                        <p style="margin-top: 7px;">Tidak hanya menawarkan pengalaman liburan yang tak terlupakan,
                            tetapi juga berbagai pilihan oleh-oleh khas yang dapat Anda bawa pulang </p>
                        <a href="https://shop.krisnabali.co.id/" class="btn btn-primary"
                            style="margin-top: 13px;">Lihat disini!</a>
                    </div>
                    <div class="col-sm-4">
                        <h3>Restoran enak di Bali</h3>
                        <p style="margin-top: 7px;">Bali, selain terkenal dengan keindahan pantainya dan budaya yang
                            kaya, juga merupakan surga bagi pecinta kuliner </p>
                        <a href="https://www.tripadvisor.co.id/Restaurants-g294226-Bali.html" class="btn btn-primary"
                            style="margin-top: 13px;">Lihat disini!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <hr>


    <div class="row g-0 position-relative">
        <div class="col-md-6 mb-md-0 p-md-4">
            <img src="{{ Storage::url('images/1718279120_point.png') }}" class="w-100"
                style="height: 300px; width: 250px;">
        </div>
        <div class="col-md-6 p-4 ps-md-0">
            <h3 class="mt-0">Make memories in Bali</h3>
            <p>Surga pulau yang kaya akan keindahan alam dan kekayaan budaya, memanggil Anda untuk menciptakan
                kenangan tak terlupakan. Dari pantai yang terkena sinar matahari di Kuta hingga kuil-kuil mistis di
                Ubud, setiap sudut tujuan menakjubkan ini menyimpan janji petualangan dan penemuan. Terjunlah ke dalam
                air jernih yang dipenuhi kehidupan laut yang berwarna-warni, jelajahi sawah hijau, atau nikmati seni
                yang hidup di pulau ini. Baik Anda mencari relaksasi atau kegembiraan, Bali menawarkan kemungkinan tak
                terbatas untuk menciptakan pengalaman Anda sendiri. Biarkan irama pulau ini memikat jiwa Anda saat Anda
                membentuk kenangan seumur hidup di surga tropis ini.
            </p>
        </div>
    </div>

    <br>


    </div>

    </div>
    </div>

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>
            Beach Buddy
        </p>
        <p>
            Annisa Cahyarina - 22/497707/SV/21154
        </p>
        <br>
        <br>

        <p>© 2024 BeachBuddy</p>
    </div>

</body>

</html>
