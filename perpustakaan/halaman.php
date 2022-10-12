<?php
//anggota
if(@$_GET['page'] == 'anggota'){
            if(@$_GET['aksi']==''){
                include 'page/data_master/anggota/anggota.php';
            }else if (@$_GET['aksi']=='tambah'){
                include 'page/data_master/anggota/tambah.php';
            }else if(@$_GET['aksi']=='editagt'){
                include 'page/data_master/anggota/edit.php';
            }else if(@$_GET['aksi']=='hapusagt'){
                include 'page/data_master/anggota/hapus.php';
            }
        }

//admin
if(@$_GET['page'] == 'petugas'){
            if(@$_GET['aksi']==''){
                include 'page/data_master/petugas/petugas.php';
            }else if (@$_GET['aksi']=='tambah'){
                include 'page/data_master/petugas/tambah.php';
            }
        }

//buku
if(@$_GET['page'] == 'buku'){
            if(@$_GET['aksi']==''){
                include 'page/buku/buku.php';
            }else if (@$_GET['aksi']=='tambah'){
                include 'page/buku/tambah.php';
            }else if(@$_GET['aksi']=='edit'){
                include 'page/buku/edit.php';
            }else if(@$_GET['aksi']=='hapus'){
                include 'page/buku/hapus.php';
            }
        }

//transaksi
if(@$_GET['page'] == 'transaksi'){
            if(@$_GET['aksi']==''){
                include 'page/transaksi/transaksi.php';
            }else if (@$_GET['aksi']=='lihatbuku'){
                include 'page/transaksi/lihatbuku.php';
            }else if(@$_GET['aksi']=='tambahtransaksi'){
                include 'page/transaksi/tambahtransaksi.php';
            }
        }

?>