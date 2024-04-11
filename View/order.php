<div class="table-responsive">
  <?php
  if (!$_SESSION['makh'] || count($_SESSION['cart']) < 1):
    echo '<script> alert("Bạn chưa đăng nhập");</script>';
    echo '<meta http-equiv="refresh" content="0;url=.index.php?action=dangnhap"/>';
    ?>
  <?php
  else:
    ?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">

        <?php
        if (isset($_SESSION['makh']) && isset($_SESSION['masohd'])) {
          $hd = new hoadon();
          $hduser = $hd->getHoaDonKH($_SESSION['masohd']);
          $sohd = $hduser['masohd'];
          $tenkh = $hduser['tenkh'];
          $ngay = $hduser['ngaydat'];
          $dc = $hduser['diachi'];
          $sodt = $hduser['sodienthoai'];
          ?>
          <tr>
            <td colspan="4">
              <h2 style="color: red;">HÓA ĐƠN</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2">Số Hóa đơn: <?php echo $sohd ?> </td>
            <td colspan="2"> Ngày lập: <?php echo $ngay ?></td>
          </tr>
          <tr>
            <td colspan="2">Họ và tên: </td>
            <td colspan="2"><?php $tenkh ?></td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ: </td>
            <td colspan="2"><?php $dc ?></td>
          </tr>
          <tr>
            <td colspan="2">Số điện thoại: </td>
            <td colspan="2"><?php $sodt ?></td>
          </tr>
          <?php
        }
        ?>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>

          <?php
          if (isset($_SESSION['makh']) && isset($_SESSION['masohd'])) {
            $j = 0;
            $hd = new hoadon();
            $result = $hd->getHoaDonCTHD($_SESSION['masohd']);
            while ($set = $result->fetch()):
              $j++
                ?>
              <tr>
                <td><?php echo $j ?></td>
                <td><?php echo $set['tenhh'];?></td>
                <td>Màu: <?php echo $set['mausac']; ?> Size:<?php echo $set['size'];?> </td>
                <td>Đơn Giá:<?php echo number_format($set['dongia']); ?> - Số Lượng: <?php echo $set['soluongmua'];?> <br />
                </td>
              </tr>
            <?php
            endwhile;
          }
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
              <?php 
              $gh=new giohang();
              echo $gh->getSubTotal();
              ?>  
              <sup><u>đ</u></sup></b>
            </td>

          </tr>
        </tbody>
      </table>
    </form>
  <?php
  endif
  ?>
</div>
</div>