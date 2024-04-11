<?php
$act = "dangky";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./View/registration.php";
        break;

    case 'dangky_action':
        //Gửi toàn bộ thông tin qua đây, post gửi đi thông qua thẻ input, select)
        //nhận, trước khi nhận cần kiểm tra
        $tenkh = '';
        $dc = '';
        $sodt = '';
        $user = '';
        $email = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $tenkh = $_POST['txttenkh'];
            $dc = $_POST['txtdiachi'];
            $sodt = $_POST['txtsodt'];
            $user = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            $saltF = "G456#@";
            $saltL = "Fa345!";
            $passnew = md5($saltF.$pass.$saltL);
            //Controller yêu cầu những thông này cần được thêm vào database
            //Trước khi insert cần kiểm tra xem username và email này có tồn tại hay chưa
            $kh = new user();
            $check = $kh->getCheckUser($user, $email)->rowCount();
            //$count=
            //var_dump($check);
            if ($check > 0) {
                echo '<script> alert("Username hoặc email đã tồn tại")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"/>';
            } else {
                //Không có thì thêm vào database
                $newkh = $kh->insertKhachHang($tenkh, $user, $passnew, $email, $dc, $sodt);
                if ($newkh !== false) {
                    echo '<scirpt>alert("Đăng ký thành công")</script>';
                    include_once "./View/home.php";
                } else {
                    echo '<scirpt>alert("Đăng ký không thành công")</script>';
                    include_once "./View/home.php";
                }
            }
            break;
        }
}
?>