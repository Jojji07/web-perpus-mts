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
    //$id        = $_GET['id'];
    //$sql        = mysqli_query($koneksi, "select *from tb_buku where id='$id'") or die(mysqli_error());
    //$data       = mysqli_fetch_array($sql);

    if(isset($_POST['submit'])){
    //ini buat variabel untuk input data (name dan id yg di kotakan input)
   // $idBuku=($_POST['id']);
    $judul=($_POST['judul']);
    $pengarang=($_POST['pengarang']);
    $penerbit=($_POST['penerbit']);
    $tahun_terbit=($_POST['tahun_terbit']);
    $isbn=($_POST['isbn']);
    $jml_buku=($_POST['jml_buku']);
    
    
    //$lokasi=$_FILES['fotoguru']['tmp_name'];
    //$nama=$_FILES['fotoguru']['name'];
    //move_uploaded_file($lokasi,"fotoguru/$nama");
    

    // pesan error untuk variabel yg belom terisi
    $pesanError = array();
    if(trim($judul)=="") {
        $pesanError[] = "Data <b>Judul Buku</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($pengarang)=="") {
        $pesanError[] = "Data <b>Pengarang</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($penerbit)=="") {
        $pesanError[] = "Data <b>Penerbit</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($tahun_terbit)=="") {
        $pesanError[] = "Data <b>Tahun Terbit</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($isbn)=="") {
        $pesanError[] = "Data <b>ISBN</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($jml_buku)=="") {
        $pesanError[] = "Data <b>Jumlah Buku</b> tidak boleh kosong, harus diisi !";        
    }


    # VALIDASI ID DI DATABASE, jika sudah ada akan ditolak
   
    

    # JIKA ADA PESAN ERROR DARI VALIDASI
    if (count($pesanError)>=1 ){
        echo "<div class='error'>";
            $noPesan=0;
            foreach ($pesanError as $indeks=>$pesan_tampil) { 
            $noPesan++;
                echo "&nbsp;&nbsp; $noPesan. $pesan_tampil <br>";   
            } 
        echo "</div>"; 
    }
    else {
        // Simpan data dari form ke Database
        $mySql  = mysqli_query($koneksi,"INSERT INTO tb_buku
            (id, judul, pengarang, penerbit, tahun_terbit, isbn, jml_buku) VALUES 
            ('', '$judul', '$pengarang','$penerbit', '$tahun_terbit','$isbn','$jml_buku')") or die ("SQL Error ". mysqli_error());
        
        if (($mySql))
                    {
                    ?>
                        <script type="text/javascript">
                               alert("Tambah Data Berhasil");
                               window.location.href="?page=buku"; // link ke halaman lihat datanya (tabel lihat data)
                           </script>
                       </script>
                       <?php
                    }  else {
                        ?>
                            <script type="text/javascript">
                                alert("Lengkapi data");
                            </script>
                            <?php
                    }
    }   
}

//$kodeBaru     = buatKode("siswa", "S");
// jika submit ada yg belum terisi, data yang sudah terisi tidak perlu di isi kembali
$dataJudul          = isset($_POST['judul']) ? $_POST['judul'] : '';
$dataPengarang      = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
$dataPenerbit       = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
$dataTahunTerbit    = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
$dataISBN           = isset($_POST['isbn']) ? $_POST['isbn'] : '';
$dataJmlBuku        = isset($_POST['jml_buku']) ? $_POST['jml_buku'] : '';

?>



	<div class="panel panel-default">
    <div class="panel-heading">
    	Tambah Data
    </div>
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form method="POST">

                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" id="judul" value="<?php echo $dataJudul;?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Pengarang</label>
                                            <input class="form-control" name="pengarang" id="pengarang"  value="<?php echo $dataPengarang;?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Penerbit</label>
                                            <input class="form-control" name="penerbit" id="penerbit" value="<?php echo $dataPenerbit;?>" />
                                            
                                        </div>


                                        <div class="form-group">
                                             <label>Tahun Terbit</label>
                                             
									    			<script>
															function hanyaAngka(evt) {
															  var charCode = (evt.which) ? evt.which : event.keyCode
															   if (charCode > 31 && (charCode < 48 || charCode > 57))
													 
															    return false;
															  return true;
															}
														</script>
                                       
                                            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" axlength="4" value="<?php echo $dataTahunTerbit;?>" onkeypress="return hanyaAngka(event)">
    												
                                        </div>

                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input class="form-control" name="isbn" id="isbn" value="<?php echo $dataISBN;?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Jumlah Buku</label>
                                            <input class="form-control" name="jml_buku" id="jml_buku" value="<?php echo $dataJmlBuku;?>" />
                                            
                                        </div>

                                        <div>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                        

                                     	</div>
                                    
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>




