<?php
$act="dangnhap";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/dangnhap.php";
        break;
    
    case 'dangnhap_action':
        // kiểm tra thông tin if(isset($_POST['login]))
        // if(isset($_POST['txtusername'])&& isset($_POST['txtpassword']))
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $user=$_POST['txtusername'];//admin
            $pass=$_POST['txtpassword'];//123456
            // đem thông tin đi kiểm tra có tồn tại hay không
            $nv=new nhanvien();
            $check=$nv->getAdmin($user,$pass);
            if($check!==false)
            {
                $_SESSION['admin']=$check['username'];
                echo '<script>alert("Đăng nhập thành công");</script>';
                 echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa"/>';
            }
            else
            {
                echo '<script>alert("Đăng nhập ko thành công");</script>';
                include_once "./View/dangnhap.php";
            }
        }
        break;
}

?>