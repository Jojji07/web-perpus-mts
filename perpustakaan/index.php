<?php
session_start();
if (!isset($_SESSION['id_petugas'])){
?>
<script>
        alert("Anda Harus Login Terlebih Dahulu.");
        window.location.href="login.php";
</script>
<?php
}
?>

<?php 

  $koneksi1 = new mysqli("localhost", "root", "", "db_perpus");

 ?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PERPUSTAKAAN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Perpustakaan</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>	
                      <li  >
                        <a  href="?page=buku"><i class="fa fa-table fa-3x"></i> Daftar Buku</a>
                    </li>
                    <li>
                     <a href="#"><i class="fa fa-laptop fa-3x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="?page=petugas">Data Petugas</a>
                            </li>
                            <li>
                                <a href="?page=anggota">Data Anggota</a>
                            </li>
                          </li>
                        </ul>
                      </li>
                    <li>
                        <a  href="?page=transaksi"><i class="fa fa-edit fa-3x"></i> Transaksi </a>
                    </li>				
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
<?php
        include "koneksi.php";
                                $admin=$_SESSION['id_petugas'];
                                $sql=  mysqli_query($koneksi,"SELECT * from admin where id_petugas='$admin' ")or die (mysqli_error());
                                while($row= mysqli_fetch_array($sql)){?>
        <div id="page-wrapper" >
            <div id="page-inner">
              <div class="col-md-12">

                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome <b><?php echo $row['nama_petugas'];

                      }?></b> , Love to see you back. </h5>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="row">
                    
                </div> 
                        <?php
                          include 'halaman.php';
                            ?>

                    </div>
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>


    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
