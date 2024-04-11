<?php
    class hoadon{
        //phương thức insert vào bảng hàng hóa đơn trước, bởi vì có hóa đơn thì mới có chi tiết hóa đơn
        //bảng chi tiết hóa đơn là bảng được sinh ra từ hóa đơn và khách hàng
        function insertHoaDon($makh)
        {
            $date = new DateTime('now');
            $ngay=$date->format('Y-m-d');// do trong database là năm-tháng-ngày
            $db=new connect();
            $query="insert into hoadon(masohd,makh,ngaydat,tongtien) values(Null,$makh,'$ngay',0";
            $db->exec($query);
            // đã insert xong r lấy mã vừa insert để insert vào cthoadon
            $select="select masohd from hoadon order by masohd desc limit 1";
            $mahd=$db->getInstance($select);
            return $mahd[0];//mahd[34];
        }
        //phương thức chèn vào bảng cthoadon
        function insertCTHoaDon($masohd,$mahh,$soluongmua,$mausac,$size,$thanhtien)
        {
            $db=new connect();
            $query="insert into cthoadon(masohd,mahh,soluongmua,mausac,size,thanhtien,tinhtrang) values($masohd,$mahh,$soluongmua,'$mausac',$size,$thanhtien,0)";
            echo $query;
            //thực thi câu lệnh insert theo dạng tiêu chuẩn là exec, còn dạng bảo mật là prepare(về tự viết lại)
            $db->exec($query);
        }
        //phương thức updatethanhtien trong bảng hóa đơn
        function updateHoaDonThanhTien($masohd,$makh,$total)
        {
            $db=new connect();
            $query="update hoadon set tongtien=$total WHERE masohd=$masohd and makh=$makh";
            $db->exec($query);
        }
        //phương thức trừ lại tồn kho của món hàng mình đã mua
        //function updateHangHoaTon($)
        //Phương thức hiển thị thông tin của khách hàng trên hóa đơn
        function getHoaDonKH($masohd){
            $db=new connect();
            $select="select b.masohd, b.ngaydat, a.tenkh, a.diachi, a.sodienthoai from khachhang a INNER JOIN hoadon b on a.makh=b.makh WHERE masohd=$masohd";
            $result=$db->getInstance($select);
            return $result;
        }
        //Phương thức hiển thị thông tin những món hàng đã mua trên hóa đơn
        function getHoaDonCTHD($masohd)
        {
            $db=new connect();
            $select="select DISTINCT a.tenhh, c.mausac, c.size, b.dongia, c.soluongmua from hanghoa a, cthanghoa b, cthoadon c WHERE a.mahh=b.idhanghoa and a.mahh=c.mahh and c.masohd=$masohd";
            $result=$db->getList($select);
            return $result;
        }    
    }
?>