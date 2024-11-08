<?php
session_start();
include 'koneksi.php';

function isImage($fileType)
{
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    return in_array($fileType, $allowedTypes);
}

if (isset($_POST['tambah'])) {
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggalunggah = date('y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $fileType = $_FILES['lokasifile']['type'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    // Cek apakah file yang diunggah adalah gambar
    if (isImage($fileType)) {
        move_uploaded_file($tmp, $lokasi . $namafoto);

        $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$judulfoto','$deskripsifoto','$tanggalunggah','$namafoto','$albumid','$userid')");

        echo "<script>
        alert('Data berhasil disimpan!');
        location.href='../admin/foto.php'
        </script>";
    } else {
        echo "<script>
        alert('Hanya file gambar yang diperbolehkan!');
        location.href='../admin/foto.php'
        </script>";
    }
}

if (isset($_POST['edit'])) {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['Judulfoto'];
    $deskripsifoto = $_POST['Deskripsifoto'];
    $tanggalunggah = date('y-m-d');
    $albumid = $_POST['albumid'];
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $fileType = $_FILES['lokasifile']['type'];
    $lokasi = '../assets/img/';
    $namafoto = rand() . '-' . $foto;

    if ($foto == null) {
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid='$albumid' WHERE fotoid='$fotoid'");
    } else {
        if (isImage($fileType)) {
            $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
            $data = mysqli_fetch_array($query);
            if (is_file('../assets/img/' . $data['lokasifile'])) {
                unlink('../assets/img/' . $data['lokasifile']);
            }
            move_uploaded_file($tmp, $lokasi . $namafoto);
            $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', lokasifile='$namafoto', albumid='$albumid' WHERE fotoid='$fotoid'");
        } else {
            echo "<script>
            alert('Hanya file gambar yang diperbolehkan!');
            location.href='../admin/foto.php'
            </script>";
        }
    }
    echo "<script>
    alert('Data berhasil diperbarui!');
    location.href='../admin/foto.php'
    </script>";
}

if (isset($_POST['hapus'])) {
    $fotoid = $_POST['fotoid'];
    $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
    $data = mysqli_fetch_array($query);
    if (is_file('../assets/img/' . $data['lokasifile'])) {
        unlink('../assets/img/' . $data['lokasifile']);
    }

    $sql = mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");
    echo "<script>
    alert('Data berhasil dihapus!');
    location.href='../admin/foto.php'
    </script>";
}
?>