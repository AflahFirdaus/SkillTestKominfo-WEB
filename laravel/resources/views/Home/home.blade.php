<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managemen Inventaris Barang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid col-md-12">
            <div class="navbar-brand">
                <a href="/"><img src="https://i.ibb.co.com/JRX0Zsj/logoM.png" alt="logoM" border="0" style="width: 40px"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/managemen_barang">Data Barang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h1 style="font-size: 50px; margin-top:70px; font-family:Verdana; font-weight:500;">
                    Selamat Datang di Managemen Inventaris Barang
                </h1>
            </div>
            <div class="col">
                <a href="/"><img src="https://i.ibb.co.com/sVv17Jy/Disply-Barang.png" alt="Disply-Barang" border="0"></a>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 text-center">
                <a href="https://imgbb.com/"><img src="https://i.ibb.co.com/SNn0ZFn/Keamanan.png" alt="Keamanan" border="0" style="width:80px"></a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 text-center">
                <p>Jaminan Keamanan 100%</p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 text-center">
                <a href="https://imgbb.com/"><img src="https://i.ibb.co.com/CmbhQSQ/Barang-Terstruktur.png" alt="Barang-Terstruktur" border="0" style="width:90px"></a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 text-center">
                <p>Data Rapi dan Terstruktur</p>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 text-center">
                <a href="https://imgbb.com/"><img src="https://i.ibb.co.com/71mZ9bF/24Jam.png" alt="24Jam" border="0" style="width:100px"></a>
            </div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 mb-3 text-center">
                <p>Kemudahan Akses 24 Jam</p>
            </div>
        </div>
    </div>

    <style>
        @media screen and (max-width: 600px) {
        img {
            max-width: 200px;
        }
    }

    @media screen and (max-width: 770px) {
        img {
            max-width: 500px;
        }
    }

    .col-12 p {
        font-size: 20px;
        font-weight: 700;
        font-family: sans-serif;
    }

    </style>
    
    {{-- Footer --}}
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>About Us</h5>
                    <p>"Ingin data aman, rapi, terstruktur, dan dapat diakses 24 Jam? <strong> Manageman Inventaris Barang Solusinya"</strong></p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white">Home</a></li>
                        <li><a href="/managemen_barang" class="text-white">Data Barang</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Social Media</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2024 Aflah Firdaus Fuady. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>