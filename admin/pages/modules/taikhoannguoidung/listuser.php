<?php
    // ket noi 
    include('./config/connect.php');
    $sql = "SELECT * FROM khachhang WHERE 1=1";
     // xoa nguoi dung 
     include('deleteUser.php');
     
     if(isset($_GET['method'])){
         $temp = $_GET['method'];
         if($temp == 'createUser'){
             // them nguoi dung
             include('createUser.php');
            //  include('viewproduct.php');
             
            }elseif ($temp = 'editUser'){
                // sua nguoi dung
                include ('editUser.php');
            }
    }else {
        include('viewUser.php');
    }
        // xem nguoi dung
        
?>