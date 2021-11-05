<?php
    session_start();
    include 'koneksi.php';
    if($_SESSION['stat_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $kode_alat = $_GET['kode_sn'];
    $data_alat = mysqli_query($conn, "SELECT * FROM tb_alat WHERE alat = '".$kode_alat."' ");

    $p = mysqli_fetch_object($data_alat);

    if(isset($_POST['update'])){
        $query = "UPDATE `tb_alat` SET alat='$_POST[alat]', jenis='$_POST[jenis]', berakhir='$_POST[berakhir]', baru='$_POST[baru]', WHERE kode_sn='$kode_alat'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo '<script type="text/javascript"> alert("Data Update") </script>';
            echo '<script>window.location="data-asset.php"</script>';
        }
        else{
            echo '<script type="text/javascript"> alert("Data Not Update") </script>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Form Controlling Asset | Administrator </title>
        <link rel="stylesheet" type="text/css" href="css/editPage.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    </head>
    <body>
        <!-- bagian header -->
        <header>
            <h1><a href="beranda.php"> Admin Controlling Asset </a></h1>
            <ul>
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="data-asset.php">Data Asset</a></li>
                <li<a href="#input-data.php">Input Data Baru</a></li>
                <li><a href="keluar.php">Keluar</a></li>
                
            </ul>
        </header>

        <!-- bagian content -->
        <section class="content">
            <h2>Edit Data Alat</h2>
            <div class="box">
                <table class ="table-data" border="0">
                    <tr>
                        <td>Nama Alat</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->alat ?></td>
                    </tr><br>
                    <tr>
                        <td>Jenis Alat</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->kode_alat ?></td>
                    </tr>
                    <tr>
                        <td>Kalibrasi Terakhir</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->berakhir ?></td>
                    <tr>
                        <td>Kalibrasi Selanjutnya</td>
                        <td>: </td>
                        <td></td>
                        <td><?php echo $p->baru ?></td>
                    </tr>
                </table>
                <br>
                <center>
                    <form action="" method="POST">
                        <input type="text" name="alat" placeholder="Masukkan Nama Alat"/><br>
                        <input type="text" name="jenis" placeholder="Masukkan Jenis Alat"/><br>
                        <input type="text" name="berakhir" placeholder="Masukkan Kalibrasi Terakhir"/><br>
                        <input type="text" name="baru" placeholder="Masukkan Kalibrasi Selanjutnya"/><br>

                        <input type="submit" name="update" value="UPDATE DATA" class="button"/>
                    </form>
                </center>
            </div>
        </section>
    </body>
</html>
