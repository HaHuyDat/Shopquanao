<?php
class user
{
    //Phương thức kiểm tra user va email có tồn tại hay không
    function getCheckUser($username, $email)
    {
        $db = new connect();
        $select = "SELECT a.username, a.email FROM khachhang a WHERE a.username='$username' or a.email='$email'";
        $result = $db->getList($select);
        return $result;
    }
    //Phương thức insert vào database
    function insertKhachHang($tenkh, $username, $matkhau, $email, $diachi, $sodienthoai)
    {
        $db = new connect();
        $query = "INSERT INTO khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai)
            VALUES (NULL,'$tenkh','$username','$matkhau','$email','$diachi','$sodienthoai')";
        //Exec
        $result = $db->exec($query);
        return $result;
    }
    //Phương thức login
    function logKhachHang($user, $pass)
    {
        $db = new connect();
        $select = "select a.makh, a.tenkh, a.username from khachhang a WHERE a.username='$user' and a.matkhau='$pass';";
        echo $select;
        $result = $db->getInstance($select);
        return $result;
    }
    function getEmail($email)
    {
        $db = new connect();
        $select = "select * from khachhang where email = '$email'";
        //    echo $select;
        $result = $db->getList($select);
        return $result;
    }
    function getPassNew($emailold, $passnew)
    {
        $db = new connect();
        $query = "update khachhang set matkhau='$passnew' where email='$emailold'";
        
        echo $query;
        $db->exec($query);
    }
   
}
?>