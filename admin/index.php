<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANIFA</title>
    <link rel="shortcut icon" href="./fontend/images/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="./fontend/fonts/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>Welcome to dashboard,admin</h1>
    <?php
        if (isset($_GET['quanly'])) {
            $temp = $_GET['quanly'];
        }else {
            $temp = '';
        }

        if ($temp == 'sanpham'){
            echo '<h3 style="text-align: center;">Quản lý sản phẩm</h3>';
        }elseif ($temp == 'admin'){
            echo '<h3 style="text-align: center;">Quản lý tài khoản admin</h3>';
        }elseif ($temp == 'user'){
            echo '<h3 style="text-align: center;">Quản lý tài khoản người dùng</h3>';
        }elseif ($temp == 'userinfor'){
            echo '<h3 style="text-align: center;">Quản lý thông tin người dùng</h3>';
        }else {
            echo '<h3 style="text-align: center;">Quản lý tài khoản admin</h3>';
        }
    ?>
    <div class="wrapper">

    
        
    <?php
        include ('../admin/pages/header.php');
        
        include ('../admin/pages/content.php');
        
    ?>     
    </div>
</body>
</html>