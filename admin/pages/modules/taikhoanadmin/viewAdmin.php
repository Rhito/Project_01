<div class="wrapper-form">

    <h3>Danh sách thông tin admin</h3>
    <?php
        // search form view product
        $keyword = "";
        if (isset($_POST['searchBtn'])) {
            $keyword = $_POST['textBox'];
            if (isset($keyword)) {
                $sql .= " AND ( id_admin LIKE '%$keyword%' OR name_admin LIKE '%$keyword%' OR username_admin LIKE '%$keyword%') ";
            } else {
                echo "Lỗi!!" . $conn->connect_error;
            }
        }
        $result = $conn->query($sql);
    ?>
    <!-- view product -->
    <form action="" method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th collspan='2'><a href="?quanly=admin&method=createAdmin">Thêm Admin</a></th>
                    <th colspan="4">
                        <input type="text" name="textBox" placeholder="Nhập vào dữ liệu muốn tìm...">
                        <input type="submit" name="searchBtn" class="searchBtn" value="Tìm kiếm"><br>
                        <?php
                        if (isset($keyword)) {
                            echo 'Kết quả cho từ khóa "' . $keyword . '"';
                        }
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>Stt</th>
                    <th>Mã Admin</th>
                    <th>Tên Admin</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Trạng thái</th>
                    <th>Phương thức</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                if (($result->num_rows) > 0) {
                    $stt=0;
                    while ($row = $result->fetch_array()) {
                        $status = $row["status"] == 1 ? "Đang hoạt động" : "Khóa";
                        $stt++;
                        echo "
                                <tr>
                                    <td>{$stt}</td>
                                    <td>{$row["id_admin"]}</td>
                                    <td>{$row["name_admin"]}</td>
                                    <td>{$row["username_admin"]}</td>
                                    <td>{$row["password"]}</td>
                                    <td>{$status}</td>
                                    <td>";?>
                                        <a href='?quanly=admin&deleteAdmin=<?php echo $row["id_admin"];?>' onclick="if(confirm('Bạn có muốn xóa không?')){return true;}else{return false;}">Xóa</a> || 
                                        <a href='?quanly=admin&method=edit&editAdmin=<?php echo $row["id_admin"];?>'>Sửa</a>
                                    </td>
                                </tr>
                <?php
                    }
                } else {
                    echo "<h2 align='center' style='color: Tomato;'>Không có dữ liệu nào được nhập vào!</h2><br>";
                }
                ?>
            </tbody>
        </table>
    </form>
</div>