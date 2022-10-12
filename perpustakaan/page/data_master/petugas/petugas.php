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

<a href="?page=petugas&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Petugas</th>
                                            <th>Nama Petugas</th>
                                            <th>Pass</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi1->query("select * from admin");

                                            while ($data= $sql->fetch_assoc()) {


                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_petugas'];?></td>
                                            <td><?php echo $data['nama_petugas'];?></td>
                                            <td><?php echo $data['pass'];?></td>
                                           
                                        </tr>


                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>