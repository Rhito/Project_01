<!-- conntent -->
<div class="content" id="content"> 
    <?php
        if(isset($_GET['idsanpham'])){
            include ('./pages/product-details.php');
        }else{

            if (isset($_GET['quanly'])){
                $temp = $_GET['quanly'];
            }else {
                $temp = '';
            }
            if ($temp == 'danhmucsanpham'){
    
                if (isset($_GET['id'])) {
                    $productId = $_GET['id'];
                    if ($productId == 1) {
                        include ('./pages/content/sanphamNam.php');
                        include ('./pages/content/suggestion-product.php');
                    }elseif ($productId == 2) {
                        include ('./pages/content/sanphamNu.php');
                        include ('./pages/content/suggestion-product.php');
                    }elseif ($productId == 3) {
                        include ('./pages/content/sanphamBetrai.php');
                        include ('./pages/content/suggestion-product.php');
                    }elseif ($productId == 4) {
                        include ('./pages/content/sanphamBegai.php');
                        include ('./pages/content/suggestion-product.php');
                    }
                }else {
                    include ('./pages/content/blockdeals.php');
    
                    include ('./pages/content/sanphamNam.php');
    
                    include ('./pages/content/sanphamNu.php');
    
                    include ('./pages/content/sanphamBetrai.php');
    
                    include ('./pages/content/sanphamBegai.php');
    
                    include ('./pages/content/block-collection.php');
    
                    include ('./pages/content/suggestion-product.php');
                }
    
            }elseif ($temp == 'gioithieu'){
                include ('infor-page/gioithieu.php');
            }elseif ($temp == 'tintuc'){
                include ('infor-page/tintuc.php');
            }elseif ($temp == 'lienhe'){
                include ('infor-page/lienhe.php');
            }elseif ($temp == 'thongtinkhachhang'){          
                include ('./pages/content/thongtinkhachhang.php');
            }else {
                include ('./pages/content/blockdeals.php');
    
                include ('./pages/content/sanphamNam.php');
                include ('./pages/content/sanphamNu.php');
                include ('./pages/content/sanphamBetrai.php');
                include ('./pages/content/sanphamBegai.php');
    
                include ('./pages/content/block-collection.php');
    
                include ('./pages/content/suggestion-product.php');
            }

            
        }

    ?>

</div>