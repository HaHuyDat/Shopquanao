<?php 
    if(isset($_POST["submit"]))
    {
        $makh=$_SESSION["makh"];
        $masp=$_SESSION["txtmahh"];
        $content=$_SESSION["comment"];
        //Thực hiện insert vào database
        $bl=new binhluan();
        $bl->insertBinhLuan($makh,$masp,$content);
    }
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id='.$masp.'"/>';
?>