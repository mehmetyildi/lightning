<?php  
include 'baglan.php';//veritabanı bağlantısını kullan

?>

<!DOCTYPE html>
<html>
<head>
<title>magExpress</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <!--Header -->
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">

              <!--Üst bar menüler -->  
              <li><a href="index.php">Home</a></li>
              


            </ul>
          </div>
          <div class="header_top_right">
            <form action="#" class="search_form">
              <input type="text" placeholder="Text to Search">
              <input type="submit" value="">
            </form>
          </div>
        </div>
        <div class="header_bottom">
          <div class="header_bottom_left"><a class="logo" href="index.html">mag<strong>Express</strong> <span>A Pro Magazine Template</span></a></div>
          <div class="header_bottom_right"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>

  <!--Header -->
  <div id="navarea">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid"> 
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--ana menüler -->  
          <ul class="nav navbar-nav custom_nav">

            <?php  
            //mysql select
            $menusorgu=mysql_query("select * from menuler");
            // if(!$menusorgu){
            //   die("Error: ".mysql_error());
            // }
           while($menucek=mysql_fetch_assoc($menusorgu)) {//while php komutu 
            ?>
            <li class=""><a href=<?php echo $menucek['tablo_menuurl'] ?>><?php echo $menucek['tablo_menuad']; ?></a></li><!--while döngüsünde çalışan html kodları için php kapandı --> 
            <?php }//whilw kapatma parantezi ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>

   <!--Panel -->