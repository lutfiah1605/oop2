<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Dashboard</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- site icon -->
   <link rel="icon" href="images/fevicon.png" type="image/png" />
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!-- site css -->
   <link rel="stylesheet" href="style.css" />
   <!-- responsive css -->
   <link rel="stylesheet" href="css/responsive.css" />
   <!-- color css -->
   <link rel="stylesheet" href="css/colors.css" />
   <!-- select bootstrap -->
   <link rel="stylesheet" href="css/bootstrap-select.css" />
   <!-- scrollbar css -->
   <link rel="stylesheet" href="css/perfect-scrollbar.css" />
   <!-- custom css -->
   <link rel="stylesheet" href="css/custom.css" />
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
   <?php
   include "koneksi.php";
   $db = new koneksi;
   ?>
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar_blog_1">
               <div class="sidebar-header">
                  <div class="logo_section">
                     <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/logo/logo.png"
                           alt="#" /></a>
                  </div>
               </div>
               <div class="sidebar_user_info">
                  <div class="icon_setting"></div>
                  <div class="user_profle_side">
                     <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" />
                     </div>
                     <div class="user_info">
                        <h6><?php echo $_SESSION['username']; ?></h6>
                        <p><span class="online_animation"></span> Online</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar_blog_2">
               <h4>MENU</h4>
               <ul class="list-unstyled components">
                  <li class="active">
                     <a href="dashboard.php" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span>
                     </a>
                  </li>
               </ul>
            </div>
         </nav>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <div class="topbar">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full">
                     <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                           class="fa fa-bars"></i></button>
                     <div class="logo_section">
                        <a href="dashboard.php"><img class="img-responsive" src="images/logo/logo.png" alt="#" /></a>
                     </div>
                     <div class="right_topbar">
                        <div class="icon_info">

                           <ul class="user_profile_dd">
                              <li>
                                 <a class="dropdown-toggle" data-toggle="dropdown"><img
                                       class="img-responsive rounded-circle" src="images/layout_img/user_img.jpg"
                                       alt="#" /><span class="name_user"><?php echo $_SESSION['username']; ?></span></a>
                                 <div class="dropdown-menu">
                                    <!-- <a class="dropdown-item" href="profile.html">My Profile</a> -->
                                    <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i
                                          class="fa fa-sign-out"></i></a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </nav>
            </div>
            <!-- end topbar -->
            <!-- dashboard inner -->
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Dashboard</h2>
                        </div>
                     </div>
                  </div>
                  <div class="card col-md-12">
                     <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                           <div class="row">
                              <div class="col-9">
                                 <h3 class="text-start">Data Beras</h3>
                              </div>
                              <div class="col-3">
                                 <p class="text-end"><a href="tambahberas.php" class="btn btn-success">Tambah Data</a>
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="table_section padding_infor_info">
                           <div class="table-responsive-sm">
                              <table class="table table-bordered">
                                 <thead class="thead-dark">
                                    <tr>
                                       <th>No</th>
                                       <th>Harga Beras/Ltr</th>
                                       <th>Harga Beras/Jiwa</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $query = "select * from beras";
                                    $no = 1;
                                    foreach ($db->tampilData($query) as $row) {
                                       ?>
                                       <tr>
                                          <td>
                                             <?php echo $no; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['harga_ltr']; ?>
                                          </td>
                                          <td>
                                             <?php echo $row['harga_jiwa']; ?>
                                          </td>
                                          <td>
                                             <a href="#?id=<?php echo $row['id']; ?>"
                                                class="btn btn-warning">Edit</a>
                                             <a href="hapusdata.php?id=<?php echo $row['id']; ?>"
                                                class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</a>
                                          </td>
                                       </tr>
                                       <?php
                                       $no++;
                                    }
                                    ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- wow animation -->
   <script src="js/animate.js"></script>
   <!-- select country -->
   <script src="js/bootstrap-select.js"></script>
   <!-- owl carousel -->
   <script src="js/owl.carousel.js"></script>
   <!-- chart js -->
   <script src="js/Chart.min.js"></script>
   <script src="js/Chart.bundle.min.js"></script>
   <script src="js/utils.js"></script>
   <script src="js/analyser.js"></script>
   <!-- nice scrollbar -->
   <script src="js/perfect-scrollbar.min.js"></script>
   <script>
      var ps = new PerfectScrollbar('#sidebar');
   </script>
   <!-- custom js -->
   <script src="js/custom.js"></script>
   <script src="js/chart_custom_style1.js"></script>
</body>

</html>