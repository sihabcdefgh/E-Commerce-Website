<?php
require "./koneksi.php";

$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);

$queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 10");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSHOP | Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="./assets/nav-bar item/shopping-cart.png" alt="Logo" width="50" height="50" class="me-2">Go<strong>SHOP!!</strong></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./produk.php">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign in
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="./userpanel/login.php">User</a></li>
                            <li><a class="dropdown-item" href="./adminpanel/login.php">Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Register
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="./userpanel/login.php">User</a></li>
                            <li><a class="dropdown-item" href="./adminpanel/login.php">Admin</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-3">
                    <img src="./assets/image-upload/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 offset-md-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-7">
                        <?php echo $produk['detail']; ?>
                    </p>
                    <p class="fs-5 text-harga">
                        Rp. <?php echo number_format($produk['harga']); ?>
                    </p>
                    <p>
                        Status : <strong><?php echo $produk['stok']; ?></strong>
                    </p>
                    <a href="./userpanel/login.php" class="btn btn-primary">Login Terlebih Dahulu!</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 warna4">
        <div class="container">
            <h3 class="text-center text-white mb-5">Produk Terkait</h3>

            <div class="row">
                <?php while ($data = mysqli_fetch_array($queryProdukTerkait)) { ?>
                    <div class="col-md-6 col-lg-3 mb-5">

                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                            <img src="./assets/image-upload/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait-image" alt="">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="container-fluid py-1 bg-dark text-align">
        <div class="container-fluid py-3 content-subscribe text-light">
            <div class="container">
                <h5 class="text-center mb-4">Temui Kami</h5>
                <div class="row justify-content-center">
                    <div class="col-sm-1 d-flex justify-content-center mb-2">
                        <a href="https://www.facebook.com/arikirikazuu"><i class="fab fa-facebook fs-4"></i></a>
                    </div>
                    <div class="col-sm-1 d-flex justify-content-center mb-2">
                        <a href="https://www.instagram.com/sihabcdefgh/"><i class="fab fa-instagram fs-4"></i></a>
                    </div>
                    <div class="col-sm-1 d-flex justify-content-center mb-2">
                        <a href="https://www.youtube.com/channel/UC7gUaDpBAa0qtPY1X0q4MvQ"><i class="fab fa-youtube fs-4"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center text-white">
            <label>&copy;2023 <strong>GoSHOP</strong> Indonesia</label>
        </div>
    </div>

    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h4 class="text-white">Tentang Kami</h4>
            <p class="text-white fs-5 mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus vitae a repellendus consequatur officia earum sint nulla sit ullam! Magni, dignissimos? Nobis soluta vitae amet nam pariatur aspernatur consectetur quos! Nesciunt blanditiis beatae quidem dolore nam adipisci laudantium facere in aliquid atque quos, nihil at libero rem laboriosam voluptates veritatis reprehenderit neque quibusdam similique iure nemo esse. Commodi, illum. Dolores, illum soluta exercitationem labore deleniti quisquam, illo earum ipsam consectetur maxime pariatur repellendus excepturi voluptatum voluptatem fuga mollitia numquam adipisci?</p>
        </div>
    </div>





    <script src="./fontawesome/js/all.min.js"></script>
</body>

</html>