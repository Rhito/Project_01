<?php
    // ket noi 
    include('./config/connect.php');
    $sql = "SELECT * FROM sanpham WHERE 1=1";

     // xoa sanpham 
     include('deleteproduct.php');
     
     if(isset($_GET['method'])){
         $temp = $_GET['method'];
         if($temp == 'createProduct'){
             // them sanpham
             include('themsanpham.php');
            //  include('viewproduct.php');
             
            }elseif ($temp = 'editProduct'){
                // sua sanpham
                include ('editproduct.php');
            }
            
    }else {
        include('viewproduct.php');
    }
        // xem sanpham
        
?>


