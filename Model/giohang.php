<?php
    class giohang{
        //Phương thức thêm vào giỏ hàng
        function addGioHang($mahh,$mausac,$size,$soluong)
        {
            //thiếu hinh, tên ,dongia, thanhtien
            $sanpham=new hanghoa();
            $sp=$sanpham-> getHangHoaId($mahh);
            $tenhh=$sp['tenhh'];
            $dongia=$sp['dongia'];
            //Lấy tên màu sắc
            $mau=$sanpham->getHangHoaMauSac($mausac);
            $tenmau=$mau['mausac'];
            //Lấy hình dựa vào mã hàng, màu sắc, size
            $hinh=$sanpham-> getHangHoaHinhMauSize($mahh,$mausac,$size);
            $img=$hinh['hinh'];
            $total=$soluong*$dongia;
            $flag=false;
            //Trước khi chèn cần kiểm tra xem cùng mã hàng, cùng màu, cùng size thì số lượng tăng 1
            foreach($_SESSION['cart']as $key =>$item){
                if($item['mahh'] ==$mahh && $item['$mausac'] == $tenmau && $item['size'] ==$size){
                    if($item['mahh'] ==$mahh && $item['mausac']== $tenmau && $item['size']==$size){
                        $flag = true;
                        $soluong += $_SESSION['cart'][$key]['soluong'];
                        $this->updateHH($key,$soluong);
                    }
                }
            }
            //Tạo đối tượng
            $item=array(
                'mahh'=> $mahh,
                'tenhh'=> $tenhh,
                'hinh' =>$img,
                'mausac'=> $mausac,
                'size'=> $size,
                'soluong'=>$soluong,
                'dongia'=>$dongia,
                'thanhtien'=>$total
            );
            //Add đối tượng vào giỏ hàng a[]
            $_SESSION['cart'][]=$item;
        }
        /*
        a=array, a[0]['size']=> 35
        $_SESSION['cart']=array({mahh:12,hinh:12.jpg,tenhh:giày cao got, mausac:Màu trắng, size:35,soluong:1,dongia:500k, thanhtien:500},
                                {mahh:22,hinh:22.jpg,tenhh:giày cao got-vang, mausac:Màu trắng, size:35,soluong:1,dongia:500k, thanhtien:500},
                                {mahh:24,hinh:12.jpg,tenhh:giày boot, mausac:Màu trắng, size:35,soluong:1,dongia:500k, thanhtien:500}
        )
        */

        //Phương thức update hàng hóa
        function updateHH($index,$soluong)//3,3
        {
            if($soluong <=0){
                unset($_SESSION['cart'][$index]);
            }else{
                //Cập nhật tin là ghép gán
                $_SESSION['cart'][$index]['soluon']=$soluong;
                //Số lượng thay đổi thì thành tiền
                $tiennew=$_SESSION['cart'][$index]['soluong']*$_SESSION['cart'][$index]['dongia'];
                $_SESSION['cart'][$index]['thanhtien']=$tiennew;
            }
        }
        //Phương thức tính tổng thành tiền trong giỏ hàng
        function getSubTotal()
        {
            $subtotal=0;
            foreach ($_SESSION['cart']as $item){
                $subtotal +=$item['thanhtien'];
            }
            $subtotal=number_format($subtotal,2);
            return $subtotal;
        }
    }
?>