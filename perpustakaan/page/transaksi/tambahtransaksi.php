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
        $tgl_sekarang = date("Y-m-d");
         date_default_timezone_set('Asia/Jakarta');
        $pesan =date('Y-m-d H:i:s');
        //echo $pesan;
        $today = date("Ymd");
        $time_sekarang = time();
        $tmbhjam=date("Y-m-d H:i:s", strtotime("+1 hours", $time_sekarang));


        $hasil = mysqli_query($koneksi,"SELECT max(kodepinjam) AS last FROM transaksi WHERE kodepinjam LIKE '%$today%'");
        $data  = mysqli_fetch_array($hasil);
        $lastNoTransaksi = $data['last'];
        $lastNoUrut = substr($lastNoTransaksi, 10, 4);
        $nextNoUrut = $lastNoUrut + 1;
        $nextNoTransaksi = "PE".$today.sprintf('%04s', $nextNoUrut);

        $tglpinjam              = date("d-m-Y");
        $tujuh_hari             = mktime(0,0,0,date("n"),date("j")+7,date("Y"));
        $tglkembali1            = date("d-m-Y", $tujuh_hari);
        $tglkembali             = date("Y-m-d", $tujuh_hari);



        if(isset($_POST['submit'])){
        $kodepinjam=($_POST['kodepinjam']);
        $id_peminjam=($_POST['id_peminjam']);
        $id_petugas=($_POST['id_petugas']);
        $tglpinjam=($_POST['tglpinjam']);
        $tglkembali=($_POST['tglkembali']);

        
        
          $mysql=  mysqli_query($koneksi, "INSERT into transaksi (kodepinjam, tglpinjam, tglkembali, id_peminjam, id_petugas) values ('$kodepinjam','$tglpinjam','$tglkembali','$id_peminjam','$id_petugas')") or die(mysqli_error());
        #membaca data cekbox dari daftar siswa 
        $cbtipe=$_POST['cbtipe'];
       // $jumlahTerpilih=  count($cbtipe);
        foreach ($cbtipe as $kodetipe ){
            #perintah untuk mendapat relasi
            $mysql=  mysqli_query($koneksi,"SELECT * from dettransaksi where kodepinjam='$kodepinjam' and id='$kodetipe' order by id") or die(mysqli_error());
            //gejala yang baru akan ditimbuklan
            if (mysqli_num_rows($mysql) < 1){
                $tambahsql=  mysqli_query($koneksi, "INSERT into dettransaksi (kodepinjam, id) values ('$kodepinjam', '$kodetipe')") or die(mysqli_error());


        // Simpan data dari form ke Database
        
                ?>
                <script type="text/javascript">
                alert("data berhasil di tambah");
                window.location.href="?page=transaksi";
        </script>
     
        <?PHP
            }
        }   
    }   


$dataKodepinjam         = isset($_POST['kodepinjam']) ? $_POST['kodepinjam'] : '';
$dataTglpinjam          = isset($_POST['tgl_sekarang']) ? $_POST['tgl_sekarang'] : '';
$dataTglkembali         = isset($_POST['tglkembali']) ? $_POST['tglkembali'] : '';
$dataidpetugas          = isset($_POST['id_petugas']) ? $_POST['id_petugas'] : '';
$dataidpeminjam         = isset($_POST['id_peminjam']) ? $_POST['id_peminjam'] : '';

$kodetipe               = isset($_POST['cbtipe']) ? $_POST['cbtipe']:'';
    ?>

    <div class="panel panel-default">
    <div class="panel-heading">
    	Tambah Data
    </div>
	<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Kode Pinjam</label>
                                            <input class="form-control" type="text" name="kdpinjam" id="kdpinjam" value="<?php echo $nextNoTransaksi ?>">
                                            <input hidden type="text" name="kodepinjam" id="kodepinjam" value="<?php echo $nextNoTransaksi ?>">
                                        
                                            <input hidden type="text" name="id_petugas" id="id_petugas" value="<?php echo $_SESSION['id_petugas']?>">
                                            <input hidden  name="tglpinjam" id="tglpinjam"        value="<?php echo $tgl_sekarang?>" />
                                            <input hidden  name="tglkembali" id="tglkembali" value="<?php echo $tglkembali?>" />
                                        

                                        </div>
                                        <div class="form-group">
                                            <label for="disabledSelect">Peminjam </label>
                                            <select name="id_peminjam" id="id_peminjam"  class="form-control">
                                                    <option value=0> -- Pilih -- </option>
                                            <?php
                                            // perhatikan name dan id. nama tabel sesuaikan 
                                            $datasql=  mysqli_query($koneksi,"SELECT * from anggota order by id_peminjam asc ") or die(mysqli_error());
                                            while($datarow=  mysqli_fetch_array($datasql)){
                                            if($dataidpeminjam==$datarow['id_peminjam']){
                                                $cek="-";
                                            }else{
                                                $cek="";
                                            }
                                            echo"<option value='$datarow[id_peminjam]' $cek>$datarow[id_peminjam]  $cek>$datarow[nama_peminjam]</option>";
                                            }
                                        ?>
                                            </select>
                                        </div>
                                            
                                      

                                        <div class="form-group">
                                            <label>Tanggal Pinjam</label>
                                            <input class="form-control" name="tglpinjam1" id="tglpinjam1" value="<?php echo $tglpinjam?>" readonly />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Kembali</label>
                                            <input class="form-control" name="tglkembali1" id="tglkembali1" value="<?php echo $tglkembali1?>" readonly/>
                                            
                                        </div>

     <div class="row panel-body table-responsive"> 

                <label class="no-padding-left" for="form-field-11">  </label>       
                <div class="col-sm-9"> 
<!-- /.panel-heading -->
                               <script type="text/javascript">
                               
                                </script>
                                <script type="text/javascript">
                                        function toggle(pilih) {
                                        checkboxes = document.getElementsByName('cbtipe[]');
                                        for(var i=0, n=checkboxes.length;i<n;i++) {
                                          checkboxes[i].checked = pilih.checked;
                                        }
                                      }
                                      </script>
                                      <!--input type="checkbox" onclick="toggle(this)"> &nbsp;Select All-->
                                      
                                <div class='table-responsive'>
                                    <table class='table table-bordered table-hover' width='100%' cellpadding='5' >
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Pilih</th>
                                                <th>Kode Buku</th>
                                                <th>Judul Buku</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun</th>
                                                <th>ISBN</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        
                                        <?php
                                        
                                        //menampilkan data
                                        $bacasql=  mysqli_query($koneksi, "SELECT * from tb_buku order by id asc") or die(mysqli_error());
                                        $nomor=0;
                                        $nomor++;
                                        while($bacadata=  mysqli_fetch_array($bacasql)){
                                            $kodetipe=$bacadata['id'];     
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td class="left"><?php echo $nomor;?></td>
                                                <td class="center">
                                                <input name="cbtipe[]" id="cbtipe" type="checkbox" value="<?php echo $kodetipe;?>" <?php if(isset($_POST['cbtipe']) && in_array($kodetipe, $_POST['cbtipe'])){
                                                    echo 'checked="checked"';   
                                                    }
                                                ?> ></td>
                                                <td class="left"><b><?php echo $bacadata['id'];?></b></td>
                                                <td class="left"><?php echo $bacadata['judul'];?></td>
                                                <td class="left"><?php echo $bacadata['pengarang'];?></td>
                                                <td class="left"><?php echo $bacadata['penerbit'];?></td>
                                                <td class="left"><?php echo $bacadata['tahun_terbit'];?></td>
                                                <td class="left"><?php echo $bacadata['isbn'];?></td>
                                      

                                                
                                            </tr>
                                            <script type="text/javascript">
                                            
                                            </script>
                                            <?php
                                            $nomor++;
                                        }
                                        
                    $jumSis = $nomor-1;
                ?>
                                             
                                        </tbody>
                                        
                                    </table>
                                   
                                    </div>
                                    </div>

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





