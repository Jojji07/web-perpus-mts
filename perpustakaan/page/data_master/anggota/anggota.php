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

<a href="?page=anggota&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

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
                                            <th>ID Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi1->query("select * from anggota");

                                            while ($data= $sql->fetch_assoc()) {


                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_peminjam'];?></td>
                                            <td><?php echo $data['nama_peminjam'];?></td>
                                            <td><?php echo $data['alamat'];?></td>
                                            <td>
                                                <a class="btn btn-info" href="?page=anggota&aksi=editagt&id=<?php echo $data['id_peminjam'];?>">Ubah</a>
                                                <a class="btn btn-danger" style="margin-top: 5px;" href="?page=anggota&aksi=hapusagt&id=<?php echo $data['id_peminjam'];?>">Hapus</a>
                                            </td>
                                        </tr>


                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>