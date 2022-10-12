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
    $id        = $_GET['id'];
    $sql        = mysqli_query($koneksi, "select *from tb_buku where id='$id'") or die(mysqli_error());
    $data       = mysqli_fetch_array($sql);

?>

    <div class="panel panel-default">
    <div class="panel-heading">
    	Ubah data
    </div>
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form method="POST">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input type="text" class="form-control" name="id" value="<?php echo $data['id'];?>" readonly />


                                        </div>

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" value="<?php echo $data['judul'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" value="<?php echo $data['pengarang'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" value="<?php echo $data['penerbit'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tahun Terbit</label>
                                            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" axlength="4" value="<?php echo $data['tahun_terbit'];?>" onkeypress="return hanyaAngka(event)">
                                                <div class="col-sm-12">
									    			<script>
															function hanyaAngka(evt) {
															  var charCode = (evt.which) ? evt.which : event.keyCode
															   if (charCode > 31 && (charCode < 48 || charCode > 57))
													 
															    return false;
															  return true;
															}
														</script>
    												</div>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input class="form-control" name="isbn" value="<?php echo $data['isbn'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jml_buku" value="<?php echo $data['jml_buku'];?> "/>
                                            
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
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $jml_buku = $_POST['jml_buku'];
    
    $update=  mysqli_query($koneksi, "UPDATE tb_buku set judul='$judul',pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', isbn='$isbn', jml_buku='$jml_buku' where id='$id'")
    or die (mysqli_error());
    echo "<script>alert('data telah di update');
    document.location.href='?page=buku'</script>";

}
?>