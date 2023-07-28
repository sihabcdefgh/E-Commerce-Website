<?php
require "session.php";
require "../koneksi.php";

$query = mysqli_query($con, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id");
$jumlahProduk = mysqli_num_rows($query);

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }

    form div {
        margin-bottom: 10px;
    }
</style>

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
                    <i class="fas fa-box-open"></i>Produk
                </li>
            </ol>
        </nav>
        <div class="container my-5 col-12 col-md-8">
            <h4>Tambahkan Produk</h4>

            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" autofocus required>
                </div>
                <div>
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" required>
                        <option value="">Pilih Satu</option>
                        <?php
                        while ($data = mysqli_fetch_array($queryKategori)) {
                        ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" name="harga" id="" required>
                </div>
                <div>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div>
                    <label for="stok">Ketersediaan Stok</label>
                    <select name="stok" id="stok" class="form-control">
                        <option value="">Pilih Satu</option>
                        <option value="tersedia">tersedia</option>
                        <option value="habis">habis</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
            </form> 
            <?php
            if (isset($_POST['simpan'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $harga = htmlspecialchars($_POST['harga']);
                $detail = htmlspecialchars($_POST['detail']);
                $stok = htmlspecialchars($_POST['stok']);

                $target_dir = "../assets/image-upload/";
                $namaFile = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $namaFile;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $randomName = generateRandomString(20);
                $new_name = $randomName . "." . $imageFileType;


                if ($nama == '' || $kategori == '' || $harga == '') {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Harap Lengkapi Data Yang Kosong!
                    </div>
                    <?php
                } else {
                    if ($namaFile != '') {
                        if ($image_size > 3000000) {
                    ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 2 MB!
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'gif' && $imageFileType != 'png') {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Jenis file tidak sesuai!
                                </div>
                        <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
                            }
                        }
                    }

                    $queryTambah = mysqli_query($con, "INSERT INTO produk (kategori_id, nama, harga, foto, detail, stok) VALUES ('$kategori', '$nama', '$harga', '$new_name', '$detail', '$stok')");
                    if ($queryTambah) {
                        ?>
                        <div class="alert alert-light mt-3" role="alert">
                            Berhasil menyimpan produk!
                        </div>

            <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
            ?>
        </div>
        <div class=" mt-3">
            <h2>List Produk</h2>

            <div class="table-responsive mt-5 mb-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($jumlahProduk == 0) {
                        ?>
                            <tr>
                                <td colspan=6 class="text-center">Data Tidak Ditemukan!</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?php echo $jumlah++; ?></td>
                                    <td><?php echo $data['nama'] ?></td>
                                    <td><?php echo $data['nama_kategori'] ?></td>
                                    <td><?php echo $data['harga'] ?></td>
                                    <td><?php echo $data['stok'] ?></td>
                                    <td>
                                        <a href="produk-detail.php?p=<?php echo $data['id']; ?>" class="btn btn-info"><i class="fas fa-search"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
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
</body>

</html>