<?php

if (!isset($_SESSION['id_petugas'])){
    session_start();
?>
<script>
        alert("Anda Harus Login Terlebih Dahulu.");
        window.location.href="login.php";
</script>
<?php
}
include "koneksi.php";
?>

	<?php
    //include"koneksi.php";
    $id_peminjam= $_GET['id'];
    $sql        = mysqli_query($koneksi, "select *from anggota where id_peminjam='$id_peminjam'") or die(mysqli_error());
    $data       = mysqli_fetch_array($sql);

?>

    <div class="panel panel-default">
    <div class="panel-heading">
    	Ubah data
    </div>
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>ID Anggota</label>
                                            <input type="text" class="form-control" name="id_peminjam" id="id_peminjam" value="<?php echo $data['id_peminjam'];?>" readonly />


                                        </div>

                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input class="form-control" name="nama_peminjam" id="nama_peminjam" value="<?php echo $data['nama_peminjam'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" name="alamat" id="alamat" value="<?php echo $data['alamat'];?>" />
                                            
                                        </div>

                                        
                                        <div>
                                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">

                                     	</div>
                                    
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>




<?php
if(isset ($_POST['submit'])){
    $id_peminjam = $_POST['id_peminjam'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $alamat = $_POST['alamat'];
    
    
    $update=  mysqli_query($koneksi, "UPDATE anggota set nama_peminjam='$nama_peminjam',alamat='$alamat' where id_peminjam='$id_peminjam'")
    or die (mysqli_error());
    echo "<script>alert('data telah di update');
    document.location.href='?page=anggota'</script>";


}
?>