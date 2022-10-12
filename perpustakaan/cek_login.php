<?php
include "koneksi.php";
session_start();
$id_petugas=$_POST['id_petugas'];
$pass=$_POST['pass'];

$login = mysqli_query($koneksi, "SELECT * from admin where (id_petugas = '$id_petugas') and (pass = '$pass')");
$rowcount = mysqli_num_rows($login);
if ($rowcount == 1) {
$_SESSION['id_petugas'] = $_POST['id_petugas'];
header("Location: index.php");
}
else
{?>
   <script>
        alert("Pastikan username dan password sudah benar. Cek kembali admin aktif atau tidak.");
        window.location.href="login.php";
</script>
    <?php
    //header("Location:loginadmin.php");
}
?>