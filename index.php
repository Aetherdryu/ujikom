<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Foto</title>
    <!-- Link ke Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        /* Menambahkan gambar latar belakang dan pengaturan lainnya */
        .header-center {
            min-height: 100vh;
            /* Mengatur tinggi minimal 100% dari viewport */
            display: flex;
            /* Menggunakan Flexbox */
            justify-content: center;
            /* Menata konten secara horizontal */
            align-items: center;
            /* Menata konten secara vertikal */
            text-align: center;
            /* Menata teks di dalam elemen */
            background-image: url('assets/images/background.jpg');
            /* Gambar latar belakang */
            background-size: cover;
            /* Membuat gambar menutupi seluruh area */
            background-position: center;
            /* Menjaga gambar tetap terpusat */
            background-repeat: no-repeat;
            /* Menghindari pengulangan gambar */
        }

        /* Mengatur posisi footer agar selalu di bawah */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <!-- Add links here if necessary -->
                </ul>
                <a href="register.php" class="btn btn-outline-dark">Daftar</a>
                <a href="login.php" class="btn btn-outline-dark ms-2">Login</a>
            </div>
        </div>
    </nav>

    <!-- Header yang terpusat dengan gambar latar belakang -->
    <header class="bg-dark py-5 header-center">
        <div class="container px-4 px-lg-5">
            <div class="text-white">
                <h1 class="display-4 fw-bolder">Selamat datang di Gallery Photo</h1>
            </div>
        </div>
    </header>

    <!-- Footer -->
    <footer class="py-3">
        <div class="container text-center">
            <p>&copy; UJIKOM PPLG 2024 | MUHAMMAD IZZ ALSHYRAZI</p>
        </div>
    </footer>

    <!-- Bootstrap JS (memerlukan jQuery dan Popper.js untuk beberapa fitur interaktif) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>