<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JI MIAGE</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logo.png" rel="icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- ****************************** GOOGLE MAPS ****************************** -->

  <link rel="stylesheet" href="gmap/css/example.css">

  <!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
    <!-- the font awesome icon library if using with `fas` theme (or Bootstrap 4.x). Note that default icons used in the plugin are glyphicons that are bundled only with Bootstrap 3.x. -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
        This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
        HTML files. This must be loaded before fileinput.min.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
    <!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js
    3.3.x versions without popper.min.js. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
        dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- the main fileinput plugin file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script>

    <!-- / GMAPS -->



    <!-- BOOTSTRAP FILEINPUT -->
    <link href="lib/bootstrap-fileinput/css/fileinput.css" rel="stylesheet">
    <link href="lib/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
    <link href="lib/bootstrap-fileinput/css/fileinput-rtl.css" rel="stylesheet">
    <link href="lib/bootstrap-fileinput/css/fileinput-rtl.min.css" rel="stylesheet">
    <!-- / BOOTSTRAP FILEINPUT -->


    <!-- some CSS styling changes and overrides -->
    <style>
        .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-avatar {
            display: inline-block;
        }
        .kv-avatar .file-input {
            display: table-cell;
            width: 213px;
        }
        .kv-reqd {
            color: red;
            font-family: monospace;
            font-weight: normal;
        }
    </style>

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
  </header><!-- #header -->
<br><br><br><br><br>


<section class=" container mt-5">

    <!-- markup -->
    <!-- note: your server code `/site/avatar_upload/1` will receive `$_FILES['avatar-1']` on form submission -->
    <!-- the avatar markup -->

    <form class="form form-vertical" action="/site/avatar-upload/1" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="kv-avatar">
                    <div class="file-loading">
                        <input id = "input-id" type = "file" class="file" data-preview-file-type = "text" >
                        <input id="avatar-1" name="avatar-1" type="file" required>
                    </div>
                </div>
                <div class="kv-avatar-hint">
                    <small>Select file < 1500 KB</small>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email Address<span class="kv-reqd">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pwd">Password<span class="kv-reqd">*</span></label>
                            <input type="password" class="form-control" name="pwd" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <hr>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>

</section>

<br><br>


<section class="row mt-5">
    <div class="container mt-5">

        <div id="map1" style="width: 800px; height: 600px; border: 1px solid #777; overflow: hidden;"></div>

    </div>
</section>




<br><br>



    <!-- BOOTSTRAP FILEINPUT -->
    <script type="text/javascript" src="bootstrap-fileinput/js/fileinput.js"></script>
    <script type="text/javascript" src="bootstrap-fileinput/js/fileinput.min.js"></script>
    <script type="text/javascript" src="bootstrap-fileinput/js/locales/fr.js"></script>
    <script type="text/javascript" src="bootstrap-fileinput/css/fileinput.min.js"></script>

    <!-- / BOOTSTRAP FILEINPUT -->

    <!-- the fileinput plugin initialization -->
    <script>
        // initialiser avec les valeurs par défaut
        $ ( "# input-id" ). fileinput ();

        // avec options de plugin
        $ ( "# input-id" ). fileinput ({ 'showUpload' : false , 'previewFileType' : 'any' });

        var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' +
            'onclick="alert(\'Call your custom code here.\')">' +
            '<i class="glyphicon glyphicon-tag"></i>' +
            '</button>';
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar">',
            layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>

    <!-- GMAPS -->
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAA6cQIrMEc9zlaKBjWiPM5rxSjlBXfTSDcGsB79vzL90uiOHMpbBRa1FFoX2YfuQNFvFKxQtpz0ZCeuw&amp;hl=fr"></script>
    <script type="text/javascript" src="jquery.gmap.min.js"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="jquery.gmap.min.js"></script>

    <script type="text/javascript" src="gmap/jquery.gmap.js"></script>
    <script type="text/javascript" src="gmap/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="gmap/example.js"></script>
    <!-- SCRIPT -->
    <script>
        $(function() {
            $('#map1').gMap();

            $("#map").gMap({ markers: [{
            latitude: 43.92,
            longitude: 2.14,
            html: "Albi",
            popup: true }],
            maptype: 'TERRAIN',
            zoom: 10 });
        });
    </script>




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


  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
