<?php
// include('admin/config/connect.php');

$id = $_GET['idsanpham'];
$sql = "SELECT * FROM sanpham WHERE id_sanpham = $id";
$result = $conn->query($sql);
$row = $result->fetch_array()
?>

<div class="page-detail-wrapper">
  <ul class="tab-list">
    <li class="tab"><a href="index.php">Trang chủ</a></li>
    <li class="tab"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']; ?>">
        <?php switch ($row['id_danhmuc']) {
          case 1:
            echo 'Nam';
            break;
          case 2:
            echo 'Nữ';
            break;
          case 3:
            echo 'Bé Trai';
            break;
          case 4:
            echo 'Bé Gái';
            break;
        }
        ?></a></li>
    <li class="tab"><a><?php echo $row['ten_sanpham']; ?></a></li>
  </ul>

  <div class="items-detail">
    <div class="items-detail-photo">
      <img src="admin/uploads/<?php echo $row['anh_sanpham']; ?>" alt="">
    </div>

    <div class="items-detail-infor">
      <div class="detail-infor-top">
        <h1><?php echo $row['ten_sanpham']; ?></h1>
        <div class="product-code">
          <span>Mã sp: <strong><?php echo $row['id_sanpham']; ?></strong></span>
        </div>
      </div>
      <span class="product-price"><?php  echo number_format($row['gia_sanpham'], 0, ',', '.')?> ₫</span>

      <span class="title-color">Màu sp: </span>
      <div class="items-detail-color cloth-color color-selected ">
        <img src="admin/uploads/<?php echo $row['mau_sanpham'];?>" alt="">
      </div>

      <div >
        <form method="post">
          <button type="submit" value="<?php echo $row['id_sanpham']; ?>" class="product-action" name="add-to-cardBtn" title="Thêm vào giỏ" >Thêm vào giỏ</button>
        </form>
      </div>
      <div class="items-title">
         <h4>Mô tả</h4>
         <p><?php if(empty($row['noidung_sanpham'])) echo 'Sản phẩm không có mô tả hoặc chưa được cập nhật thông tin mô tả.'; 
                  else{ echo $row['noidung_sanpham'];}
         ?></p>
      </div>

    </div>
  </div>

</div>
<?php
  include ("pages/content/suggestion-product.php");
?>