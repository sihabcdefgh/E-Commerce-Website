<?php
require "./koneksi.php";
$queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 12");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSHOP Indonesia | Situs Belanja Online Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">

</head>

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


    <br>
    <div class="container md-5 d-flex align-items-center">
        <div class="container text-center">
            <h1><strong>𝒢𝑜𝒮𝐻𝒪𝒫</strong></h1><br>
            <h3>Cari Sesuatu?</h3>
            <div class="col-8 offset-md-2">
                <form class="d-flex" role="search" method="get" action="produk.php">
                    <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Cari" name="keyword">
                    <button type="submit" class="btn btn-dark">Cari</button>
                </form>
            </div>

        </div>
    </div>

    <div class="container mt-5 g-5 mb-5">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="./assets/ads/3.png" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/ads/4.png" class="d-block" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="container-fluid py-5 mt-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <h2><a class="no-decoration" href="produk.php?kategori=Baju Pria">Baju Pria</a></h2>
                    <div class="highlighted-kategori kategori-baju-pria">

                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h2><a class="no-decoration" href="produk.php?kategori=Sepatu Wanita">Sepatu Wanita</a></h2>
                    <div class="highlighted-kategori kategori-sepatu-wanita">

                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h2><a class="no-decoration" href="produk.php?kategori=Celana Pria">Celana Pria</a></h2>
                    <div class="highlighted-kategori kategori-celana-pria">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-md-3 col-md-2 mb-5">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="./assets/image-upload/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['nama']; ?> </h5>
                                <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                                <p class="card-text text-harga">Rp. <?php echo number_format($data['harga']); ?></p>
                                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-primary" href="produk.php">See More</a>
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