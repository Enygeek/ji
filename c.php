<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>JI MIAGE</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/all.css">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<style>

    @media screen and (max-width: 768px) {
      #header #logo img {
        min-height: 70px;
      }
    }

    #contact .form button[type="submit"]:hover {
  background: #18284c;
  color: white;
}

</style>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" style="margin-left: 80px; " class="scrollto">JI MIAGE</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="inscription/">S'inscrire</a></li>
          <li id="bloque" class="menu-has-children"><a href="">Plus</a>
            <ul>
              <li><a href="#about">Mots du PCO</a></li>
              <li><a href="#team">Speakers</a></li>
              <li><a href="#clients">Partenaires</a></li>
            </ul>
          </li>
          <li><a href="contact/">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->


  <main id="main">

    <!-- ==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactez-nous</h3>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Addresse</h3>
              <address>Cestia 2ep, 2 Plateaux, Côte d'Ivoire</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Téléphone</h3>
              <p><a href="tel:+255895548855">+225 89 85 85 54</a><br><a href="tel:+25507829892">+225 07 82 98 92</a></p>
            </div>
          </div>
          
          <div class="col-md-4">
              <div class="contact-address">  
                <i class="ion-ios-email-outline"></i>
                <h3>Email</h3>
                <p><a href="mailto:jimiage2020@gmail.com">jimiage2020@gmail.com</a></p>
              </div>
            </div>


        </div>

        <div class="form">
          <div id="sendmessage">Votre message a bien été envoyé. Merci!</div>
          <div id="errormessage"></div>

          <form action="trt/contact.php" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Svp ecrivez nous un message ici" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" name="valider">Envoyer votre Message</button></div>
          </form>
        </div>

      </div>
    </section--><!-- #contact -->

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure class="footer-logo">
                    <a href="#"><img src="img/logo.png" alt="logo"></a>
                </figure>

                <nav class="footer-navigation">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="#intro">Home</a></li>
                        <li><a href="#about">Mot du PCO</a></li>
                        <li><a href="#programs">Programme</a></li>
                        <li><a href="#clients">Partenaire</a></li>
                        <li><a href="#portfolio">Galerie</a></li>
                    </ul>
                </nav>
                <p class="text-center white mb-3 mt-3">Copyright &copy; <script>document.write(new Date().getFullYear());</script> JI MIAGE | Réalisé avec <i class="fa fa-heart" aria-hidden="true"></i> par la Commission Logiciel</p>
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
  <!-- #footer -->

  <a href="#" class="back-to-top pt-2"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="js/script.js"></script>
  <script src="js/all.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

  <script type="text/javascript">
    var cpo = []; cpo["_object"] ="cp_widget_e3c251fa-3053-4848-be7a-d64c9a38ca71"; cpo["_fid"] = "AkJAon-WnjDC";
    var _cpmp = _cpmp || []; _cpmp.push(cpo);
    (function() { var cp = document.createElement("script"); cp.type = "text/javascript";
    cp.async = true; cp.src = "//www.cincopa.com/media-platform/runtime/libasync.js";
    var c = document.getElementsByTagName("script")[0];
    c.parentNode.insertBefore(cp, c); })();
  </script>

</body>
</html>
