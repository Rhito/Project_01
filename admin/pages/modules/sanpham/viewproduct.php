<div class="wrapper-form">

    <h3>Danh sách sản phẩm</h3>
    <?php
        // search form view product
        $keyword = "";
        if (isset($_POST['searchBtn'])) {
            $keyword = $_POST['textBox'];
            if (isset($keyword)) {
                $sql .= " AND ( id_sanpham LIKE '%$keyword%' OR ten_sanpham LIKE '%$keyword%' OR id_danhmuc LIKE '%$keyword%' OR tinhtrang_sanpham = '$keyword' ) ";
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
                    <th collspan='2'><a href="?quanly=sanpham&method=createProduct">Thêm sản phẩm</a></th>
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
                    <th>Mã sản phẩm</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Màu sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Mã danh mục</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Nội dung sản phẩm</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                if (($result->num_rows) > 0) {
                    $stt=0;
                    while ($row = $result->fetch_array()) {
                        $status = $row["tinhtrang_sanpham"] == 1 ? "Kinh doanh" : "Ngừng kinh doanh";
                        $stt++;
                        echo "
                                <tr>
                                    <td>{$stt}</td>
                                    <td>{$row["id_sanpham"]}</td>
                                    <td><img src='uploads/{$row["anh_sanpham"]}' width='150px'></td>
                                    <td><img src='uploads/{$row["mau_sanpham"]}' width='60px'</td>
                                    <td>{$row["ten_sanpham"]}</td>
                                    <td>{$row["id_danhmuc"]}</td>
                                    <td>{$row["soluong"]}</td>
                                    <td>{$row["gia_sanpham"]}</td>
                                    <td>{$status}</td>
                                    <td>{$row["noidung_sanpham"]}</td>
                                    <td>";?>
                                        <a href='?quanly=sanpham&deleteProduct=<?php echo $row["id_sanpham"];?>' onclick="if(confirm('Bạn có muốn xóa không?')){return true;}else{return false;}">Xóa</a> || 
                                        <a href='?quanly=sanpham&method=edit&editProduct=<?php echo $row["id_sanpham"];?>'>Sửa</a>
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