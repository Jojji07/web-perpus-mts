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
    $kodepinjam= $_GET['id'];

    ?>

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
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Penerbit</th>
                                            <th>Tahun</th>
                                            <th>ISBN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql        = mysqli_query($koneksi, "SELECT transaksi.*, tb_buku.*, dettransaksi.* FROM transaksi, tb_buku, dettransaksi 
                                        WHERE transaksi.kodepinjam=dettransaksi.kodepinjam and tb_buku.id=dettransaksi.id and transaksi.kodepinjam='$kodepinjam'") or die(mysqli_error());
                                        while ($data = mysqli_fetch_array($sql)){;
?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['judul'];?></td>
                                            <td><?php echo $data['pengarang'];?></td>
                                            <td><?php echo $data['penerbit'];?></td>
                                            <td><?php echo $data['tahun_terbit'];?></td>
                                            <td><?php echo $data['isbn'];?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>