<?php
$action="hoadon";
if(isset($_GET['$action']))
{
    $action=$_GET['action'];
}
switch($action){
    case 'hoadon':
        $hd=new HoaDon();
        $makhang=$_SESSION['makh'];
        $sohdid=$hd->insertOrder($makhang);//26
        $_SESSION['sohd']=$sohdid;
        $total=0;
        //Duyệt qua giỏ hàng đem thông tin toàn bộ món hàng chèn vào cthoadon
        foreach($_SESSION['cart']as $key=>$item)
        {
            //Viết phương thức chèn vào bảng chi tiết hóa đơn
            $hd->insertOrderDetail($sohdid,$item['mahh'],$item['qty'],$item['mau'],
            $item['size'],$item['total']);
            $total+=$item['total'];
            //Khi chèn vào bảng chi tiết hoa đơn rồi thì phải update lại bảng hàng hóa
            $hd->updateMahhTotal($item['mahh'],$item['qty']);
        }
        //Tiến hành update ngược lại trong bảng hoadon, update tổng tiền
        $hd->updateOrderTotal($sohdid,$total);
        include "./View/order.php";
        break;
}
?>