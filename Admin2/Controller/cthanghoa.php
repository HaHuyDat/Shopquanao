<?php
    $act="cthanghoa";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'cthanghoa':
            include_once "./View/cthanghoa.php";
            break;
        
        case 'cthanghoa_action':
            if(isset($_POST["submit"]))
            {
                $mahh=$_POST['mahh'];
                $idmau=$_POST['idmau'];
                $idsize=$_POST['idsize'];
                $dongia=$_POST['dongia'];
                $soluongton=$_POST['soluongton'];
                $hinh=$_FILES['image']['name'];
                $giamgia=$_POST['giamgia'];
                // đem thông tin insert vào database
                $ct=new cthanghoa();
                $check=$ct->insertCTHangHoa($mahh,$idmau,$idsize,$dongia,$slt,$hinh,$giamgia);
                if($check!==false)
                {
                    uploadImage();
                    echo '<script>alert("Thêm dữ liệu thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=../index.php?action=cthanghoa"/>';
                }
                else
                {
                    echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                    echo '<meta http-equiv=refresh content="0;url=../index.php?action=cthanghoa"/>';
                }
            }
            break;
    }
?>