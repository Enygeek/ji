<?php
require '../../config/database.php';
    session_start();
  if((empty($_SESSION['user']))){
    header("location:../../");
  }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <?php include "nav.php" ?>

  <br>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>JI MIAGE Liste de Payement</title>

  <!-- Link -->
    <!-- <link rel="icon" href="">
    <link rel="stylesheet" href="../design/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../design/css/style.css">
    <link rel="stylesheet" href="../design/css/all.css">  -->

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    body {
      background: url("Retro - 3994.mp4");
    }

    #photo {
      height: 70px;
      width: 100px;
    }
  </style>
</head>

<body id="page-top">
<br><br>
  <!-- Page Wrapper -->
  <div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid mt-5 pl-3 pr-3 mb-5">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste Etudiant</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Photo</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Sexe</th>
                      <th>Niveau</th>
                      <th>Contact</th>
                      <th>Montant A Payer</th>
                      <th>Solde</th>
                      <th>Reste A Payer</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Photo</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Sexe</th>
                      <th>Niveau</th>
                      <th>Contact</th>
                      <th>Montant A Payer</th>
                      <th>Solde</th>
                      <th>Reste A Payer</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php

                    $db = Database::connect();
                    $sql = $db->query('SELECT * FROM etudiant ORDER BY reste_a_payer ASC');
                    while ($exist = $sql->fetch()) {


                      if ($exist['reste_a_payer'] == 0) {
                        echo '<tr>';
                        echo "<td class='mx-auto'><img id='photo' style='width:70px; height: 70px'  src=../../". $exist['lien_photo'] . " alt='...'></td>";
                        echo '<td>' . $exist['nom'] . '</td>';
                        echo '<td>' . $exist['prenom'] . '</td>';
                        echo '<td>' . $exist['sexe'] . '</td>';
                        echo '<td>' . $exist['niveau'] . '</td>';
                        echo '<td>' . $exist['tel'] . '</td>';
                        echo '<td>' . $exist['montant_a_payer'] . '</td>';
                        echo '<td>' . $exist['solde'] . '</td>';
                        echo '<td style="background: #51eaa4; color: black;">' . $exist['reste_a_payer'] . '</td>';
                        echo '</tr>';
                      } else {
                        echo '<tr >';
                        echo "<td class='mx-auto'><img id='photo' style='width:70px; height: 70px'  src=../../" . $exist['lien_photo'] . " alt='...'></td>";
                        echo '<td>' . $exist['nom'] . '</td>';
                        echo '<td>' . $exist['prenom'] . '</td>';
                        echo '<td>' . $exist['sexe'] . '</td>';
                        echo '<td>' . $exist['niveau'] . '</td>';
                        echo '<td>' . $exist['tel'] . '</td>';
                        echo '<td>' . $exist['montant_a_payer'] . '</td>';
                        echo '<td>' . $exist['solde'] . '</td>';
                        echo '<td style="background: #ec7577; color: black;">' . $exist['reste_a_payer'] . '</td>';
                      }

                      echo '</tr>';
                    }


                    ?>

                    </tr>
                  </tbody>

                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


  <!-- Script -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>


    <a href="#" class="back-to-top mt-3"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../lib/lightbox/js/lightbox.min.js"></script>
  <script src="../lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../js/main.js"></script>
  <script src="../../js/all.js"></script>

</body>

</html>

<?php } ?>
