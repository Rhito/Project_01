<?php
        if (isset($_GET['deleteProduct'])){
            $id = $_GET['deleteProduct'];
            $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
            $result = $conn->query($sql);
            while($row = $result->fetch_array()){
                unlink("./uploads/{$row['anh_sanpham']}");
                unlink("./uploads/{$row['mau_sanpham']}");
            }
            $delete = "DELETE FROM sanpham WHERE id_sanpham = '$id'";
            $resultDelete = $conn->query($delete);
            if ( $resultDelete) {
                echo "<h2 align='center' style='background-color: Tomato;'>Xóa thành công</h2>
                    ";
                    header("Location: index.php?quanly=sanpham");
            }
        }
    ?>
