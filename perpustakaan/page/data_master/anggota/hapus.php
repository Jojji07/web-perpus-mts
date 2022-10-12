

<?php
include "../koneksi.php";
$a=  mysqli_query($koneksi, "select * from anggota where id_peminjam='$_GET[id]'");
$cek= mysqli_fetch_array($a);
$sql=mysqli_query($koneksi,"delete from anggota where id_peminjam='$_GET[id]'");
if($sql){
    ?>
<script type="text/javascript">
	alert("Data Dihapus")
    window.location.href="?page=anggota";
</script>
<?php
}else{
    echo "Gagal karena: ".mysqli_error();
}
?>