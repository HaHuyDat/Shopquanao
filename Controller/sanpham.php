<?php
//controller gọi view sản phẩm
// include_once "./View/sanpham.php"
//
// //Để controller gọi đến nhiêu view khác nhau thi biến 
// //trên url, đặt tên là act
$act = "sanpham";
if (isset($_GET['act'])) {
    $act = $_GET['act']; //sanphamkhuyenmai
}
switch ($act) {
    case 'sanpham':
        include_once "./View/sanpham.php";
        break;

    case 'sanphamkhuyenmai':
        include_once "./View/sanpham.php";
        break;

    case 'sanphamchitiet':
        include_once "./View/sanphamchitiet.php";
        break;
    case 'timkiem':
        include_once "./View/sanpham.php";
        break;
    // case 'comment':
    //     if(isset($_GET['id']))
    //     {
    //         $mahh=$_GET['id'];
    //         $makh=$_SESSION['makh'];
    //         $noidung=$_POST['comment'];
    //         //cần đưa thông tin vào databasse, model làm
    //         $ur=new user();
    //         $ur->insertBinhLuan($mahh,$makh,$noidung);
    //     }
    //     include "./View/sanphamchitiet.php";
    //     break;
}

?>