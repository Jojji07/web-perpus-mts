


<?php
include "koneksi.php";
$a=  mysqli_query($koneksi, "select * from tb_buku where id='$_GET[id]'");
$cek= mysqli_fetch_array($a);
$sql=mysqli_query($koneksi,"delete from tb_buku where id='$_GET[id]'");
if($sql){
    ?>
<script type="text/javascript">
	alert("Data Dihapus")
    window.location.href="?page=buku";
</script>
<?php
}else{
    echo "Gagal karena: ".mysqli_error();
}
?>