<?php
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
} else if (isset($_GET['kategori'])) {
    $queryGetKategoriID = mysqli_query($con, "SELECT id FROM kategori WHERE nama = '$_GET[kategori]'");
    $kategoriID = mysqli_fetch_array($queryGetKategoriID);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriID[id]'");
} else {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSHOP | Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/nav-bar item/shopping-cart.png" alt="Logo" width="50" height="50" class="me-2">Go<strong>SHOP!!</strong></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="about.php">About</a></li>
                            <li><a class="dropdown-item" href="../userpanel/logout.php">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h5 class="mb-5">Semua Kategori</h5>
                <ul class="list-group">
                    <?php while ($kategori = mysqli_fetch_array($queryKategori)) { ?>
                        <a href="produk.php?kategori=<?php echo $kategori['nama'] ?>">
                            <li class="list-group-item"><?php echo $kategori['nama'] ?></li>
                        </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h5 class="text-center mb-5">Semua Produk</h5>
                <div class="row">
                    <?php
                    if ($countData < 1) {
                    ?>
                        <h4 class="text-center my-5">Produk Tidak Ditemukan!</h4>
                    <?php
                    }
                    ?>
                    <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="../assets/image-upload/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $produk['nama']; ?> </h5>
                                    <p class="card-text text-truncate"><?php echo $produk['detail']; ?></p>
                                    <p class="card-text text-harga">Rp. <?php echo number_format($produk['harga']); ?></p>
                                    <a href="produk-detail.php?nama=<?php echo $produk['nama'];  ?>" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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

    <script src="../fontawesome/js/all.min.js"></script>

</body>

</html>