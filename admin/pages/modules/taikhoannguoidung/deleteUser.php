<?php
        if (isset($_GET['deleteUser'])){
            $id = $_GET['deleteUser'];

            $delete = "DELETE FROM khachhang WHERE id_khachhang = '$id'";
            $resultDelete = $conn->query($delete);
            if ( $resultDelete) {
                echo "<h2 align='center' style='background-color: Tomato;'>Xóa thành công</h2>
                    ";
                    header("Location: index.php?quanly=user");
            }
        }
    ?>
