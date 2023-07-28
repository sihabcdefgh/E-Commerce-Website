<?php
require "session.php";
require "../koneksi.php";

$queryKategory = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategory);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

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
                        <a class="nav-link" aria-current="page" href="kategori.php">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="https://instagram.com/sihabcdefgh">About</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i>Home
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-align-justify"></i>Kategori
                </li>
            </ol>
        </nav>
    </div>

    <div class="container my-5 col-12 col-md-7">

        <h4>Tambahkan Kategori</h4>

        <form action="" method="POST">
            <div>
                <label for="kategoru">Kategori</label>
                <input class="form-control" type="text" name="kategori" id="kategori" placeholder="Input Nama Kategori" autofocus autocomplete="off">
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit" name="simpanKategori">Simpan</button>
            </div>
        </form>

        <?php
        if (isset($_POST['simpanKategori'])) {
            $kategori = htmlspecialchars($_POST['kategori']);

            $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE nama = '$kategori'");
            $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);

            if ($jumlahDataKategoriBaru > 0) {
        ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Kategori sudah ada!
                </div>
                <?php
            } else {
                $querySimpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                if ($querySimpan) {
                ?>
                    <div class="alert alert-light mt-3" role="alert">
                        Berhasil Menambahkan Kategori!
                    </div>
                    <meta http-equiv="refresh" content="2 ; url=kategori.php">
        <?php
                } else {
                    echo mysqli_error($con);
                }
            }
        }
        ?>
    </div>

    <div class="container mt-5 mb-5">
        <h3>List Kategori</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlahKategori == 0) {
                    ?>
                        <tr>
                            <td colspan=3 class="text-center">Data Tidak Ditemukan!</td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($queryKategory)) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $jumlah; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td>
                                    <a href="kategori-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                </td>
                            </tr>
                    <?php
                            $jumlah++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container-fluid py-1 bg-dark text-align mt-5">
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
</body>

</html>