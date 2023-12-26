<?php
    // ket noi 
    include('./config/connect.php');
    $sql = "SELECT * FROM admin WHERE 1=1";
     // xoa nguoi dung 
     include('deleteAdmin.php');
     
     if(isset($_GET['method'])){
         $temp = $_GET['method'];
         if($temp == 'createAdmin'){
             // them nguoi dung
             include('createAdmin.php');
            //  include('viewproduct.php');
             
            }elseif ($temp = 'editAdmin'){
                // sua nguoi dung
                include ('editAdmin.php');
            }
    }else {
        include('viewAdmin.php');
    }
        // xem nguoi dung
        
?>