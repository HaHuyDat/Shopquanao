<?php
class connect
{
    //Thuộc tính
    var $db = null;
    //Hàm tạo được gọi khi tạo 1 đội tượng
    function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=shopquanao'; //Nếu có vấn đề xảy ra thì để là 'mysql:host=localhost;post=3307' Trong trường hợp không kết nối được với csdl
        $user = 'root';
        $pass = ''; //Nếu xài xamp, wamp thì để $pass=''
        //Tạo đối tượng từ class PDO
        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // echo "Kết nối thành công";
        } catch (\Throwable $th) {
            //throw $th;
            echo "Kết nối không thành công";
            echo $th;
        }
    }
    // Phương thức thực thi câu truy vấn select? Ai làm? Quẻy
    // Phương thức trả về nhiều dòng
    function getList($select)
    {
        $result=$this->db-> query($select);// $result=$this->db-> query($select*from);
        return $result;//1 table là 1 array lớn
    }
    //Phương thức trả về row
    function getInstance($select){
        $result=$this->db-> query($select);// $result=$this->db-> query($select*from...where);        
        $result=$result->fetch();//result là 1 array của 1 dòng
        return $result;
    }
    //Phương thức thực hiện câu truy vấn insert, update, delete
    function exec($query)
    {
        $result=$this->db->exec($query);//
        return $result;
    }
    //Phương thức dùng prepare
    function execP($query){
        $statement=$this -> db-> prepare($query);
        return $statement;
    }
    

}
?>