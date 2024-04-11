<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./Content/CSS/Tour.css" rel="stylesheet" />
<div class="table-responsive">
  <?php
  if(isset($_SESSION['cart'])&& count($_SESSION['cart'])>0) 
  {
    ?>
    <form action="index.php?action=giohang&act=giohang_update" method="post">
      <table class="table table-bordered">
        <thead>
          <tr><td colspan="5"><h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2></td></tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $j=0;
            foreach($_SESSION['cart']as $key=>$item):
              $j++;
          ?>
            <tr>
              <td></td>
              <td><img width="50px" height="50px" src="./Content/imagetourdien/<?php echo $item['hinh'];?> <?php ?>"></td>
              <td>Màu:<?php echo $item['mausac'];?>  Size: <?php echo $item ['size']; ?> </td>
              <td>Đơn Giá:<?php echo $item['dongia'];?> - Số Lượng: <input type="text" name="newqty[<?php echo $key;?>]" value="<?php echo $item['soluong']; ?>" /><br />
                <p style="float: right;"> Thành Tiền <sup><u>đ</u></sup></p>
              </td>
              <td><a href="index.php?action=giohang&act=giohang_xoa&id=<?php echo $key; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>

                <button type="submit" class="btn btn-secondary">Sửa</button>

              </td>
            </tr>
<?php
endforeach;
?> 
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                $gh= new giohang();
                echo $gh->getSubTotal();
                 ?>  
              <sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=thanhtoan">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
    </form>
 <?php
  }
  else
  {
    echo '<script>alert("Giỏ hàng của bạn chưa có hàng");</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
  }

 ?>
</div>
</div>