<?php 
    class page{
        //Phương thức tính số trang dựa vào tổng số sản phẩm và limit
        function findPage($count,$limit)
        {
            $page=(($count%$limit)==0?$count/$limit:ceil($count/$limit));
            return $page;//2
        }
        //Phương thức tính start bắt đâu cần lấy giá trị trong sql
        //dựa vào curent_page trên URL, thông qua biến tự đặt tên là page
        function findStart($limit)
        {
            if(!isset($_GET['page'])||$_GET['page']==1)
            {
                $start=0;
            }
            else
            {
                $start=($_GET['page']-1)*$limit;
            }
            return $start;//8
        }
    }


?>