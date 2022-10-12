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

<a href="?page=transaksi&aksi=tambahtransaksi" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Transaksi</a>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Peminjam</th>
                                            <th>Nama Peminjam</th>
                                            <th>Petugas</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $m1=mysqli_query($koneksi, "SELECT transaksi.*, anggota.*, admin.* from transaksi, anggota, admin where anggota.id_peminjam=transaksi.id_peminjam AND admin.id_petugas=transaksi.id_petugas");
                                            while ($data = mysqli_fetch_array($m1)){;


                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kodepinjam'];?></td>
                                            <td><?php echo $data['nama_peminjam'];?></td>
                                            <td><?php echo $data['nama_petugas'];?></td>
                                            <td><?php echo $data['tglpinjam'];?></td>
                                            <td><?php echo $data['tglkembali'];?></td>
                                            <td>
                                                <a class="btn btn-info" href="?page=transaksi&aksi=lihatbuku&id=<?php echo $data['kodepinjam'];?>">lihat data buku</a>
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