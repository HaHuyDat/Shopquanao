<?php 
    $act="thanhtoan";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act){
        case 'thanhtoan':
            //controller yêu cầu model insert vào database thì mới có thông tin hiển thị lên order
            $hd=new hoadon();
            if(isset($_SESSION['makh']))
            {
                $makh=$_SESSION['makh'];
                $sohd=$hd->insertHoaDon($makh);//34
                $_SESSION['masohd']=$sohd;
                //tiến hành thêm vào bảng chi tiết hóa đơn
                //duyệt qua giỏ hàng, đem thông tin từng món hàng add vào database
                $total=0;
                foreach ($_SESSION['cart'] as $key=> $item){
                    //Viết phương thức chèn vào bảng cthoadon
                    $hd ->insertCTHoaDon($sohd,$item['mahh'],$item['soluong'],$item['mausac'],$item['size'],$item['thanhtien']);
                    //Sau khi thực thi insert vào bảng cthoandon thì update tổng thành tiền vào lại bảng hóa đơn và trừ lại số lượng tồn của
                    $total +=$item['thanhtien'];
                    //update ngược lại bảng hàng hóa
                }
                $hd ->updateHoaDonThanhTien($sohd,$makh,$total);
            }
            include_once "./View/order.php";
            break;
    }

?>