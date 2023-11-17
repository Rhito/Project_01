 <!-- header -->
 <div class="header">
            <!-- logo home -->
            <img onclick="document.location.href='#'" src="./fontend/images/logo.svg" alt="" width="7%">

            <!-- list menu -->
            <ul class="list-menu">
                <li>
                    <a href="#">Trang Chủ</a>
                </li>
                <li>
                    <a href="#">Giới Thiệu</a>
                </li>
                <li>
                    <a href="#">Tin Tức</a>
                </li>
                <li>
                    <a href="#">Liên Hệ</a>
                </li>
                <li>
                    <a href="#">Sản Phẩm</a>
                    <ul class="submenu">
                        <li><a href="">Nam</a></li>
                        <li><a href="">Nữ</a></li>
                        <li><a href="">Bé trai</a></li>
                        <li><a href="">Bé gái</a></li>
                    </ul>
                </li>
            </ul>

            <!-- menu login and cart-shopping -->
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

                <div class="cart-shopping">
                    <a href="#">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="cart-shopping-title">Giỏ hàng</span>
                    </a>
                </div>
            </div>
        </div>