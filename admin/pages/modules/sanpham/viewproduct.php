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
                    <th><a href="?quanly=sanpham&method=createProduct">Thêm sản phẩm</a></th>
                    <th colspan="3">
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
                    <th>Tên sản phẩm</th>
                    <th>Mã danh mục</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Trạng thái</th>
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
                                        <td>{$row["ten_sanpham"]}</td>
                                        <td>{$row["id_danhmuc"]}</td>
                                        <td>{$row["soluong"]}</td>
                                        <td>{$row["gia_sanpham"]}</td>
                                        <td>{$status}</td>
                                        <td>
                                            <a href='?quanly=sanpham&deleteProduct={$row["id_sanpham"]}'>Xóa</a> || 
                                            <a href='?quanly=sanpham&method=edit&editProduct={$row["id_sanpham"]}'>Sửa</a>
                                        </td>
                                    </tr>
                                    ";
                    }
                } else {
                    echo "<h2 align='center' style='color: Tomato;'>Không có dữ liệu nào được nhập vào!</h2><br>";
                }
                ?>
            </tbody>
        </table>
    </form>
</div>