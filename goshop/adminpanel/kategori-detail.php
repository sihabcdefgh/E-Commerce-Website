<?php
require "../koneksi.php";
require "session.php";

$id = $_GET['p'];
$query = mysqli_query($con, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
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
        <h3>Detail Kategori</h3>

        <div class="col-12 col-md-6">
            <form action="" method="POST">
                <div>
                    <label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama'] ?>">
                </div>
                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
                    <button type="submit" class="btn btn-danger" name="deleteBtn">Hapus</button>

                </div>

            </form>
            <?php
            if (isset($_POST['editBtn'])) {
                $kategori = htmlspecialchars($_POST['kategori']);

                if ($data['nama'] == $kategori) {
            ?>
                    <meta http-equiv="refresh" content="0 ; url=kategori.php" />
                    <?php
                } else {
                    $query = mysqli_query($con, "SELECT * FROM kategori WHERE nama = '$kategori'");
                    $jumlahData = mysqli_num_rows($query);

                    if ($jumlahData > 0) {
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori sudah ada!
                        </div>
                        <?php
                    } else {
                        $querySimpan = mysqli_query($con, "UPDATE kategori SET nama = '$kategori' WHERE id = '$id'");
                        if ($querySimpan) {
                        ?>
                            <div class="alert alert-light mt-3" role="alert">
                                Berhasil Mengupdate Kategori!
                            </div>
                            <meta http-equiv="refresh" content="2" ; url=kategori.php>
                    <?php
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }
            }

            if (isset($_POST['deleteBtn'])) {
                $queryCheck = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id = '$id'");
                $dataCount = mysqli_num_rows($queryCheck);

                if ($dataCount > 0) {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Tidak bisa menghapus kategori!
                    </div>
                <?php
                }

                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id = '$id'");
                if ($queryDelete) {
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori Berhasil di Update!
                    </div>
                    <meta http-equiv="refresh" content="2 ; url=kategori.php" />
            <?php
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>


</body>

</html>