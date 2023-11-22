<?php
    // ket noi 
    include('./config/connect.php');
    $sql = "SELECT * FROM sanpham WHERE 1=1";

     // xoa sanpham 
     include('deleteproduct.php');

     include('viewproduct.php');
    
    if(isset($_GET['method'])){
        $temp = $_GET['method'];
        if($temp == 'createProduct'){
            // them sanpham
            include('themsanpham.php');
        }elseif ($temp = 'edit'){
            // sua sanpham
            include ('editproduct.php');
        }
    }
        // xem sanpham
        
?>


