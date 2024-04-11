<?php
    //Nếu như người dùng chưa có giỏ hàng thì phải tạo giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); //Bởi vì người mua nhiều sản phẩm
    }
    $act = "giohang";
    if (isset($_GET['act'])) 
    {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'giohang':
            include_once "./View/cart.php";
            break;

        case 'giohang_action':
            # code...
            $mamh = 0;
            $mausac = '';
            $size = 0;
            if (isset($_POST['mahh'])) {
                echo "hhhh";
                //Chỉ nhận được mahh, màu sắc, size, số lượng vì nó nằm trong thẻ input và select
                $mahh = $_POST['mahh'];
                $mausac = $_POST['mymausac'];
                $size = $_POST['size'];
                $soluong = $_POST['soluong'];
                //Controller yêu cầu model add vào trong giỏ hàng
                $gh=new giohang();
                $add=$gh-> addGioHang($mahh,$mausac,$size,$soluong);
                echo '<meta http-equiv="refresh"content="0;url=./index.php?action=giohang"/>';
            }
            break;
        case "giohang_xoa":
            //Nhận key về và xóa
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                unset($_SESSION['cart'][$id]);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang"/>';
            }
            break;

        case "giohang_update":
            //Nhận những giá trị từ thẻ input or select
            if(isset($_POST['newqty'])){
                $newsoluong=$_POST['newqty'];//$newsoluong=[0:1,1:4]
                //Do duyệt qua $_SESSION['cart'] đối tượng nào có số lượng khác với số lượng trong $newsoluong thì cập nhật lại
                foreach ($newsoluong as $key =>$value){
                    if($_SESSION['cart'][$key]['soluong']!=$value)
                    {
                        $gh=new giohang();
                        $gh->updateHH($key,$value);
                        echo '<meta http-equiv="refresh"content="0;url=./index.php?action=giohang"/>';
                    }
                }
            }
            break;
    }
?>