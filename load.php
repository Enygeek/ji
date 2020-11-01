<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8">
        <title>preloader</title>
    </head>

    <body>
      <div id="loading"><img src="img/logo.png"></div>
      <div id="site" style="display:none;">
      </div>
      <?php include('index.html')?>
      
      <script type="text/javascript">
      
      var x = setTimeout(function(){document.getElementById("loading").style.display = "none";
document.getElementById("site").style.display = "block";},3000);

      </script>
      </body>
</html>