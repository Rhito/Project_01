<?php
        if (isset($_GET['deleteAdmin'])){
            $id = $_GET['deleteAdmin'];

            $delete = "DELETE FROM admin WHERE id_admin = '$id'";
            $resultDelete = $conn->query($delete);
            if ( $resultDelete) {
                echo "<h2 align='center' style='background-color: Tomato;'>Xóa thành công</h2>
                    ";
                    header("Location: index.php?quanly=admin");
            }
        }
    ?>
