<?php

class hanghoa
{
    //thuộc tính
    //hàm tạo
    //phương thức lấy ra 8 sản phẩm mới nhất
    function getHangHoaNew()
    {
        //Kết nối được database
        $db = new connect();
        //B2: cần lấy cái gì, thì truy vấn cái đó
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia, c.mausac, a.soluotxem from hanghoa a, cthanghoa b, mausac c WHERE a.mahh=b.idhanghoa and b.idmau=c.Idmau ORDER by a.mahh DESC limit 8";
        //B3: ai thực thi câu lệnh select? query, mà query để trong phương thức của connect
        // echo $select;
        $result = $db->getList($select);
        return $result;// Dữ liệu được lấy từ database về

    }
    //Phương thức lấy ra những sản phẩm giảm giá, giảm giá có giảm là khác 0  
    function getHangHoaSale()
    {
        //Kết nối được database
        $db = new connect();
        //B2: cần lấy cái gì, thì truy vấn cái đó
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia, c.mausac, a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and b.giamgia!=0 ORDER by a.mahh DESC limit 4";
            // echo $select;
        //B3: ai thực thi câu lệnh select? query nằm trong 2 phương thức getList và getInstance, mà 2 phương thức nằm trong class connect, cần tạo đối tượng gọi phương thức
        $result = $db->getList($select);
        return $result;// Dữ liệu được lấy từ database về //trả về được 14 sản phẩm

    }
    //Phương thức lấy ra những hàng hóa không có sale
    function getHangHoaNonSale()
    {
        $db = new connect();
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia, c.mausac, a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and b.giamgia=0 ORDER by a.mahh DESC limit 4";
        $result = $db->getList($select);
        return $result;

    }
    function getHangHoaAll(){
        //Kết nối được database
        $db=new connect();
        //B2: cần lấy cái gì, thì truy vấn cái đó
        $select="select a.mahh, a.tenhh, b.hinh, b.dongia, c.mausac, a.soluotxem, b.giamgia from hanghoa a, cthanghoa b, mausac c 
        WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau ORDER by a.mahh DESC";
        //B3: ai thực thi câu lệnh select? query nằm trong 2 phương thức getList và getInstance, mà 2 phương thức nằm trong class connect, cần tạo đối tượng gọi phương thức
        $result=$db-> getList($select);
        return $result;
    }     
    function getHangHoaAllSale()
    {
        //Kết nối được database
        $db = new connect();
        //B2: cần lấy cái gì, thì truy vấn cái đó
        $select = "select a.mahh, a.tenhh, b.hinh, b.dongia, c.mausac, a.soluotxem, b.giamgia 
            from hanghoa a, cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and b.giamgia!=0 ORDER by a.mahh DESC";
        //B3: ai thực thi câu lệnh select? query nằm trong 2 phương thức getList và getInstance, mà 2 phương thức nằm trong class connect, cần tạo đối tượng gọi phương thức
        $result = $db->getList($select);
        return $result;// Dữ liệu được lấy từ database về //trả về được 14 sản phẩm

    }
    function getHangHoaAllPage($start,$limit)
        {
            //B1: Kết nối được với dữ liệu
            $db=new connect();
            //B2: Cần lấy cái gì thì truy vấn cái đó
            $select="select a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, c.mausac
            from hanghoa a, cthang b,mausac c
            WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and b.giamgia=0 ORDER by a.mahh DESC limit ".$start.",".$limit;
            // echo $select;
            //B3: ai truy vấn select? query nằm trong 2 phương thức getList và getInstance, ma 2 phương thức nằm trong
            //class connect, cần tạo đối tượng gọi phương thức
            $result=$db->getList($select);
            return $select;//Trả về được 14 sản phẩm
        }
    function getHangHoaId($id)
    {
        $db=new connect();
        $select="select DISTINCT b.mahh, b.tenhh, b.mota, a.dongia from cthanghoa a, hanghoa b WHERE a.idhanghoa=b.mahh and b.mahh=$id";
        //Query? getList và getInstance
        $result=$db->getInstance($select);
        return $result;//Trả về 1 row, mà row đã fetch, array(mahh=21, tenhh:giày...)
    }
    //Lấy thông tin màu của 1 sản phẩm
    function getHangHoaMau($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.Idmau, b.mausac from cthanghoa a, mausac b
            WHERE a.idmau=b.Idmau and a.idhanghoa=$id";
            echo $select;
        $result = $db->getList($select);
        return $result;
    }
    //Phương thức thực hiện lấy ra size
    function getHangHoaSize($id)
    {
        $db = new connect();
        $select = "select DISTINCT b.Idsize, b.size from cthanghoa a, sizeao b
            WHERE a.idsize=b.Idsize and a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
     //Phương thức lấy hình của 1 sản phẩm
     function getHangHoaHinh($id)
     {
         $db = new connect();
         $select = "select a.hinh from cthanghoa a WHERE a.idhanghoa=$id";
         $result = $db->getList($select);
         return $result;
     }
      //Phương thức lấy hình dựa vào mã hàng, màu, size
    function getHangHoaHinhMauSize($mahh, $mausac, $size)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.hinh FROM cthanghoa a, mausac b, sizeao c
            WHERE a.idmau=b.idmau and a.idsize=c.idsize
            AND a.idhanghoa=$mahh and b.idmau=$mausac and c.size=$size";

        $result = $db->getInstance($select);
        return $result;
    }
    //Phương thức truy vấn lấy màu người dùng chọn
    function getHangHoaMauSac($idmau)
    {
        $db = new connect();
        $select = "SELECT a.mausac FROM mausac a WHERE a.Idmau=$idmau";
        $result = $db->getInstance($select);
        return $result;
    }

    public function getListHangHoaAllPage($start,$limit)//8/8
    {
        $db=new connect();
        $select="select * from hanghoa limit".$start.",".$limit;
        $results=$db->getList($select);
        return $results;
    }
    //Phương thức tìm kiếm
    public function getTimKiem($timkiem)
    {
        $db=new connect();
        $select="select *from hanghoa WHERE tenhh like'%$timkiem%'";
        //echo $select;
        $result=$db->getList($select);
        return $result;
    }
    
    //phương thức tìm kiếm
    function selectTimKiem($tenhh)
    {
        $db=new connect();
        $select="select a.mahh, a.tenhh, a.soluotxem, b.dongia, b.hinh, c.mausac 
        from hanghoa a, cthanghoa b, mausac c
        WHERE a.mahh=b.idhanghoa and b.idmau=c.idmau and a.tenhh like '%$tenhh%' ORDER by a.mahh DESC";
        //Ai thực thi câu lệnh select? query, mà query trong getList và getInstance, 2 phương thức này trong class connect
        $result=$db->getList($select);
        return $result; //Lấy được 14 sản phẩm
    }
    }
?>