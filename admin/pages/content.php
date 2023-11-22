<div class="content">
    <?php
        if (isset($_GET['quanly'])) {
            $temp = $_GET['quanly'];
        }else {
            $temp = '';
        }

        if ($temp == 'admin'){
            include ('pages/modules/taikhoanadmin/listadmin.php');
            
        }elseif ($temp == 'sanpham'){
            include ('pages/modules/sanpham/listsanpham.php');
            
        }elseif ($temp == 'user'){
            include ('pages/modules/taikhoannguoidung/listuser.php');

        }elseif ($temp == 'userinfor'){
            include ('pages/modules/userinfor/listuserinfor.php');

        }else {
            include ('pages/modules/taikhoanadmin/listadmin.php');

        }
    ?>
    
</div>