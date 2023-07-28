<?php
session_start();
require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoSHOP | Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/nav-bar item/shopping-cart.png">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    .main {
        height: 100vh;
    }

    .login-box {
        width: 600px;
        height: 500px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
        <label for="" class="d-flex justify-content-center align-items-center mt-3"><strong><h2><img src="../assets/nav-bar item/shopping-cart.png" alt="" width="50px">USER</h2></strong></label>
            <form action="" method="post">
                <div>
                    <label for="username_pelanggan">Username</label>
                    <input type="text" class="form-control" name="username_pelanggan" id="username_pelanggan" autofocus autocomplete="off" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control mb-5" name="password" id="password" required>
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                    <a href="create-account.php" class="btn btn-warning d-flex justify-content-center align-items-center mt-3">Crete Account!</a>
                    <a href="../adminpanel/login.php" class="btn btn-primary d-flex justify-content-center align-items-center mt-3">Ganti Ke Admin</a>
                </div>
                
            </form>
        </div>
        <div class="mt-3">
            <?php
            if (isset($_POST['loginbtn'])) {
                $username_pelanggan = htmlspecialchars($_POST['username_pelanggan']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($con, "SELECT * FROM pelanggan WHERE username_pelanggan='$username_pelanggan'");
                $countdata = mysqli_num_rows($query);
                $data = mysqli_fetch_array($query);

                if ($countdata > 0) {
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['username_pelanggan'] = $data['username_pelanggan'];
                        $_SESSION['login'] = true;
                        header('location: ./index.php');
                    } else {
            ?>
                        <div class="alert alert-danger" role="alert">
                            Maaf, Password Salah
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Maaf, Akun tidak ditemukan!
                    </div>
            <?php
                }
            }
            ?>
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