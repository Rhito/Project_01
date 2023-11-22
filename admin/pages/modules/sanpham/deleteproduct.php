<?php
        if (isset($_GET['deleteProduct'])){
            $id = $_GET['deleteProduct'];
            $delete = "DELETE FROM sanpham WHERE id_sanpham = '$id'";
            $resultDelete = $conn->query($delete);
            if ( $resultDelete) {
                echo "<h2 align='center' style='background-color: Tomato;'>Xóa thành công</h2>
                    ";
            }
        }
    ?>
