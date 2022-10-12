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
    $id_petugas=($_POST['id_petugas']);
    $nama_petugas=($_POST['nama_petugas']);
    $pass=($_POST['pass']);

    
    
    //$lokasi=$_FILES['fotoguru']['tmp_name'];
    //$nama=$_FILES['fotoguru']['name'];
    //move_uploaded_file($lokasi,"fotoguru/$nama");
    

    // pesan error untuk variabel yg belom terisi
    $pesanError = array();
    if(trim($id_petugas)=="") {
        $pesanError[] = "Data <b>ID Peminjam</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($nama_petugas)=="") {
        $pesanError[] = "Data <b>Nama Peminjam</b> tidak boleh kosong, harus diisi !";        
    }
     if(trim($pass)=="") {
        $pesanError[] = "Data <b>Alamat</b> tidak boleh kosong, harus diisi !";        
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
        $mySql  = mysqli_query($koneksi,"INSERT INTO admin
            (id_petugas, nama_petugas, pass) VALUES 
            ('$id_petugas','$nama_petugas','$pass')") or die ("SQL Error ". mysqli_error());
        
        if (($mySql))
                    {
                    ?>
                        <script type="text/javascript">
                               alert("Tambah Data Berhasil");
                               window.location.href="?page=petugas"; // link ke halaman lihat datanya (tabel lihat data)
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
$dataIDPetugas      = isset($_POST['id_petugas']) ? $_POST['id_petugas'] : '';
$dataNamaPetugas    = isset($_POST['nama_petugas']) ? $_POST['nama_petugas'] : '';
$dataPass           = isset($_POST['pass']) ? $_POST['pass'] : '';

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
                                            <label>ID Petugas</label>
                                            <input class="form-control" name="id_petugas" id="id_petugas" maxlength="10"> value="<?php echo $dataIDPetugas;?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input class="form-control" name="nama_petugas" id="nama_petugas" value="<?php echo $dataNamaPetugas;?>"/>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Pass</label>
                                            <input class="form-control" name="pass" id="pass" value="<?php echo $dataPass;?>" />
                                            
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




