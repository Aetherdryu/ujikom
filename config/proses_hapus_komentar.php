<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script>alert('Anda belum login');location.href='../index.php';</script>";
    exit("User belum login.");
}

// Mendapatkan komentarid dari URL
$komentarid = $_GET['komentarid'];
$fotoid = $_GET['fotoid'];

// Validasi apakah komentar milik pengguna yang login
$userid = $_SESSION['userid'];
$query_cek = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE komentarid='$komentarid' AND userid='$userid'");

if (mysqli_num_rows($query_cek) > 0) {
    // Hapus komentar
    $query_hapus = mysqli_query($koneksi, "DELETE FROM komentarfoto WHERE komentarid='$komentarid'");
    if ($query_hapus) {
        echo "<script>alert('Komentar berhasil dihapus');location.href='../admin/index.php#komentar$fotoid';</script>";
    } else {
        echo "<script>alert('Gagal menghapus komentar');location.href='../admin/index.phpp#komentar$fotoid';</script>";
    }
} else {
    echo "<script>alert('Anda tidak memiliki izin untuk menghapus komentar ini');location.href='../admin/index.phpp#komentar$fotoid';</script>";
}
?>