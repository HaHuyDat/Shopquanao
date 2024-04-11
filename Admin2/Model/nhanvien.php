<?php
class nhanvien{
    function getAdmin($user,$pass)
    {
        $db=new connect();
        $select="select username,matkhau from nhanvien where username='$user' and matkhau='$pass'";
        // echo $select;
        $result=$db->getInstance($select);
        return $result;
    }
}
?>