<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANIFA</title>
    <link rel="shortcut icon" href="./fontend/images/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./fontend/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="./fontend/css/main.css">
    <link rel="stylesheet" href="./fontend/css/resposive.css">
    <link rel="stylesheet" href="./fontend/css/product-details.css">
    <link rel="stylesheet" href="./fontend/css/page.css">
    
</head>

<body>
    <div class="wrapper">
      <?php
        include ('admin/config/connect.php');
       
        include ('./pages/header.php');

        if (isset($_GET['quanly'])){
          if($_GET['quanly'] == 'danhmucsanpham') {
            include ('./pages/slider.php');
          }

        }else {
          include ('./pages/slider.php');
        }
        
        include ('./pages/content.php');

        include ('./pages/footer.php');
        
        include ('./pages/back-to-top.php');
        
        ?>
    </div>

   <!-- jquery -->
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <!-- slick slider -->
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="./fontend/js/app.js"></script>
    <script src="./fontend/js/ajax.js"></script>
</body>

</html>