<div class="wrapper-form">

    <h3>Danh sách sản phẩm</h3>
    <?php
        // search form view product
        $keyword = "";
        if (isset($_POST['searchBtn'])) {
            $keyword = $_POST['textBox'];
            if (isset($keyword)) {
                $sql .= " AND ( id_khachhang LIKE '%$keyword%' OR ten_khachhang LIKE '%$keyword%' OR tuoi_khachhang LIKE '%$keyword%' OR 
                                email LIKE '%$keyword%' OR tendangnhap LIKE '%$keyword%' OR diachi LIKE '%$keyword%' OR sodienthoai LIKE '%$keyword%') ";
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
                    <th collspan='2'><a href="?quanly=user&method=createUser">Thêm người dùng</a></th>
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
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Tuổi</th>
                    <th>Giới Tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
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
                        $status = $row["trangthai"] == 1 ? "Đang hoạt động" : "Khóa";
                        $gender = $row["gioitinh"] == 1 ? "Nam" : "Nữ";
                        $stt++;
                        echo "
                                <tr>
                                    <td>{$stt}</td>
                                    <td>{$row["id_khachhang"]}</td>
                                    <td>{$row["ten_khachhang"]}</td>
                                    <td>{$row["tuoi_khachhang"]}</td>
                                    <td>{$gender}</td>
                                    <td>{$row["diachi"]}</td>
                                    <td>{$row["sodienthoai"]}</td>
                                    <td>{$row["email"]}</td>
                                    <td>{$row["tendangnhap"]}</td>
                                    <td>{$row["matkhau"]}</td>
                                    <td>{$status}</td>
                                    <td>";?>
                                        <a href='?quanly=user&deleteUser=<?php echo $row["id_khachhang"];?>' onclick="if(confirm('Bạn có muốn xóa không?')){return true;}else{return false;}">Xóa</a> || 
                                        <a href='?quanly=user&method=edit&editUser=<?php echo $row["id_khachhang"];?>'>Sửa</a>
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