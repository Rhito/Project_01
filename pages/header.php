<?php
    session_start();

    $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];

    $id = $_POST['add-to-cardBtn'];
    $sql = "SELECT * FROM sanpham WHERE id_sanpham = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    $quantity = (isset($_POST['cartQtyBtn'])) ? $_POST['cart-qty'] : 1;
    if (isset($_POST['add-to-cardBtn'])){
        $items = [
                    'id_sanpham' => $row['id_sanpham'],
                    'ten_sanpham' => $row['ten_sanpham'],
                    'mau_sanpham' => $row['mau_sanpham'],
                    'anh_sanpham' => $row['anh_sanpham'],
                    'gia_sanpham' => $row['gia_sanpham'],
                    'quantity' => $quantity,
                ];

        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity'] += 1;
        }else {
            $_SESSION['cart'][$id] = $items;
        }
       
        // var_dump($_SESSION['cart']);
        // die();
    }
?>

<!-- header -->
 <div class="header">
            <!-- logo home -->
            <img onclick="document.location.href='index.php'" src="./fontend/images/logo.svg" alt="" width="7%">

            <?php
                if (isset($_GET['quanly'])){
                    $temp = $_GET['quanly'];
                }else {
                    $temp = '';
                }
            ?>
            <!-- list menu -->
            <ul class="list-menu">
                <li>
                    <a href="index.php" class="<?php if($temp == '') echo 'site-active'; ?>">Trang Chủ</a>
                </li>
                <li>
                    <a href="index.php?quanly=gioithieu" class="<?php if($temp == 'gioithieu') echo 'site-active'; ?>">Giới Thiệu</a>
                </li>
                <li>
                    <a href="index.php?quanly=tintuc" class="<?php if($temp == 'tintuc') echo 'site-active'; ?>">Tin Tức</a>
                </li>
                <li>
                    <a href="index.php?quanly=lienhe" class="<?php if($temp == 'lienhe') echo 'site-active'; ?>">Liên Hệ</a>
                </li>
                <li>
                    <a href="index.php?quanly=danhmucsanpham" class="<?php if($temp == 'danhmucsanpham') echo 'site-active'; ?>">Sản Phẩm</a>
                    <ul class="submenu">
                        <?php
                            include ('admin/config/connect.php');
                            $sql = "SELECT * FROM danhmuc WHERE 1 = 1";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_array()) {
                                if ($row['trangthai'] == 1) {
                                    echo "<li><a href='index.php?quanly=danhmucsanpham&id={$row['id_danhmuc']}'>{$row['ten_danhmuc']}</a></li>";
                                }
                            }
                        ?>
                    </ul>
                </li>
            </ul>

            <!-- menu icons -->
            <div class="menu-icon">
                <div class="user-login">
                    <a class="login-select">
                        <i class="fa-solid fa-user"></i>
                        <span class="user-title">Tài khoản</span>
                    </a>
                </div>
                <!-- modal login -->
                <div class="login-modal">
                    <div class="modal-content">
                        <div class="modal-close">
                            <i class="fa-solid fa-x"></i>
                        </div>
                        
                        <div class="block-login">
                            <div class="login-img">
                                <img src="./fontend/images/account-login.png" alt="">
                            </div>
                        
                            <form action="" method="post" class="signin-frm">
                                <h1>Xin chào,</h1>
                                <label for="login_username">Tên đăng nhập:</label>
                                <input class="form-control" type="text" name="login_username" id="login_username" placeholder="Tên đăng nhập">
                                <label for="login_password">Mật khẩu:</label>
                                <input class="form-control" type="password" name="login_password" id="login_password" placeholder="Mật khẩu">
                                <button class="form-control submit-btn" name="submit-login-btn">
                                    Tiếp tục
                                </button>
                            </form>
                            <div class="note-term">
                                <p>* nếu bạn chưa có tài khoản hãy đăng ký <a class="sign-in">* tại đây</a></p>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- model sign-in -->
                <div class="signin-modal">
                    <div class="modal-content">
                        <div class="modal-signin-close">
                            <i class="fa-solid fa-x"></i>
                        </div>
                    </div>

                    <div class="block-signin">
                        <div class="modal-content ">
                            <form action="" method="post" class="signin-frm">
                                <h1>Vui lòng nhập đầy đủ thông tin,</h1>  
                                    <label for="username">Tên đăng nhập:</label>
                                    <input class="form-control" type="text" name="username" id="username" placeholder="Tên đăng nhập">
                                    
                                    <label for="password">Mật khẩu:</label>
                                    <input class="form-control" type="password" name="password" id="password" placeholder="Mật khẩu">
                                    
                                    <label for="full_name">Họ và tên</label>
                                    <input class="form-control" type="text" name="full_name" id="full_name">
                                    
                                    <label for="age">Tuổi</label>
                                    <input class="form-control" type="text" name="age" id="age">
                                    
                                    <label for="gender">Giới tính</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select> 
                                    
                                    <label for="address">Địa chỉ</label>
                                    <input class="form-control" type="text" name="address" id="address">
                                    
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" name="email" id="email">
                                    
                                    <label for="phone">Số điện thoại</label>
                                    <input class="form-control" type="number" name="phone" id="phone">
                                    
                                    <button class="form-control submit-btn" name="submit-login-btn">
                                        Tiếp tục
                                    </button>
                            </form>

                        </div>

                    </div>
                </div>

                    <!-- modal cart-shopping  -->
                <div class="cart-shopping">
                    <a class="cart-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="cart-shopping-title">Giỏ hàng</span>
                    </a>
                    
                    <div class="cart-wrapper">
                        <div class="exit-cart"></div>

                        <div class="block-cart">
                            <div class="block-cart-heading">
                                <h3 class="cart-title">Giỏ hàng</h3>
                                <button class="cart-close"><i class="fa-solid fa-angles-right"></i></button>
                            </div>
                            
                            <div class="block-cart-content">
                                <?php foreach ($cart as $key => $values): ?>
                                <div class="cart-item">
                                    <div class="cart-item-photo">
                                        <img src="admin/uploads/<?php echo $values['anh_sanpham']; ?>" alt="" class="cart-img">
                                    </div>
                                    <div class="cart-item-details">
                                        <a href="?idsanpham=<?php echo $values['id_sanpham']; ?>" class="cart-item-name">Áo phông dài tay bé trai cotton USA phối màu</a>
                                        
                                        <div class="cart-show">
                                            <div class="cart-infor">
                                                <div class="cloth-color color-selected">
                                                    <img src="admin/uploads/<?php echo $values['mau_sanpham']; ?>" alt="">
                                                </div>
                                                <span class="id-product">Mã SP: <?php echo $values['id_sanpham']; ?></span>
                                                <span class="normal-price"><?php echo $values['gia_sanpham']; ?></span>
                                            </div>
    
                                            <div class="cart-quantity">
                                                <form method="post">
                                                    <div class="cart-item-qty">
                                                        <a class="minus-qty"><i class="fa-solid fa-minus"></i></a>
                                                        <input type="text" value="<?php echo $values['quantity']; ?>" class="input-qty" name="cart-qty">
                                                        <a class="plus-qty"><i class="fa-solid fa-plus"></i></a>   
                                                    </div>
                                                    <button type="submit" class="cartQtyBtn" name="cartQtyBtn" style="cursor: pointer;">Cập nhật số lượng</button>

                                                </form>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="remove-cart-item">
                                        <i class="fa-solid fa-x"></i>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="block-cart-footer">
                                <div class="price-pay">
                                    <h4>Tạm tính: </h4>
                                    <p class="normal-price">150000</p>
                                </div>
                                <button type="submit" class="payBtn" name="payBtn">Thanh toán</button>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        