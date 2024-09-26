<?php
// session_start();
require_once 'core/connection.php';
require_once 'core/db-hook.php';


if (isset($_POST['logout'])) {
    session_destroy();
    header('location:/');
}


if (isset($_POST['submit'])) {
    $name = strip_tags($_POST['name']);
    $stock =  strip_tags($_POST['stock']);
    $harga = (int)strip_tags($_POST['harga']);


    if (empty($name) || empty($stock) || empty($harga)) {
        echo "<script>alert('pastikan form tidak kosong')</script>";
    } else {
        $id_barang = $_GET['id'];
        if (pelangganUpdate($id_barang, $name, $stock, $harga)) {
            header('location:/pelanggan');
            echo "<script>alert('data berhasil diupdate!')</script>";
        } else {
            header('location:/pelanggan');
            echo "<script>alert('data gagal diupdate!')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="banner">
            <h1>Item No.36</h1>
        </div>
        <div class="menu">
            <a href="/">
                <img src="../img/full-m2i8G6K9K9b1Z5b1.png" width="45px" alt="">
                <p>Dashboard </p>
            </a>
            <a href="/items">
                <img src="../img/pngegg.png" width="45px" alt="">
                <p> List Barang</p>
            </a>
            <a href="/transaction">
                <img src="../img/payment-icon-5650.png" width="45px" alt="">
                <p>Transaksi</p>
            </a>
            <a href="/pelanggan">
                <img src="../img/person.png" width="45px" alt="">
                <p>Pelanggan</p>
            </a>
            <a href="/suplier">
                <img src="../img/delivery-truck.png" width="45px" alt="">
                <p>Suplier</p>
            </a>
        </div>
        <!-- <form method="post">
            <input type="submit" name="logout" value="Keluar" />
        </form> -->

    </header>

    <div class="wr">
        <div class="header-top">
            <h4>Selamat Datang <?php $user = $_SESSION['login'];
                                echo "$user"; ?>!</h4>
            <form method="post">
                <input type="submit" name="logout" value="Logout" />
            </form>
        </div>

        <main>

            <div class="login2">
                <form method="post">
                    <?php
                    $id_barang = $_GET['id'];
                    $target = $conn->query("SELECT * FROM `pelanggan` WHERE id=$id_barang")->fetch_assoc();
                    ?>

                    <h2>Edit Pelanggan</h2>
                    <input class="field" type="text" name="name" value="<?php echo $target['nama']; ?>">
                    <br />
                    <input class="field" type="text" name="stock" value="<?php echo $target['alamat']; ?>">
                    <br />
                    <input class="field" type="number" name="harga" value="<?php echo  $target['telpon']; ?>">
                    <input class='btn-login' type="submit" name="submit" value="Selesai" />
                </form>
            </div>
    </div>




    </main>

</body>

</html>