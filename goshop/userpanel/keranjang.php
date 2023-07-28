<?php
session_start();
require "../koneksi.php";

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('Tidak ada item dalam keranjang!');</script>";
    echo "<script>location='produk.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSHOP | Keranjang </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">
</head>

<body>

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
                <h3>Keranjang</h3>
            </div>
        </div>
        <div class="container mb-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Produk</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($_SESSION["keranjang"] as $id => $jumlah) :
                        $ambilData = mysqli_query($con, "SELECT * FROM produk WHERE id='$id'");
                        $pecah = $ambilData->fetch_assoc();
                        $subtotal = $pecah['harga'] * $jumlah;
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><img src="../assets/image-upload/<?php echo $pecah['foto']; ?>" width=150></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp.<?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo number_format($subtotal); ?></td>
                            <td>
                                <a href="hapus-keranjang.php?id=<?php echo $id ?>" class="btn btn-danger mb-3 mt-4"><i class="fa-solid fa-trash"></i>Hapus</a><br>
                                <a href="checkout.php?id=<?php echo $pecah['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-money-bill-1-wave"></i> Checkout</a>
                            </td>
                            
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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