<?php
    $act='forget';
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'forget':
            include_once "./View/forgetpassword.php";
            break;
        
        case 'forget_pass':
            // nhận email về
            if(isset($_POST['submit_email']))
            {
                $email=$_POST['email'];
                $_SESSION['email']=array();
                // kiểm tra xem email này có tồn tại hay không
                $usr=new user();
                $countuser=$usr->getEmail($email)->rowCount();
                if($countuser>0)
                {
                    // tạo pass ngẫu nhiên
                    $code=random_int(10,1000);
                    // tạo đối tượng
                    $item=array(
                        'id'=>$code,
                        'email'=>$email,
                    );
                    // add vào session
                    $_SESSION['email'][]=$item;
                    // tiến hành gửi email đi
                    $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;                  
                    // GMAIL username to:
                    // $mail->Username = "php22023@gmail.com";//
                    $mail->Username = "hahuydatkg56565@gmail.com";//
                    // GMAIL password
                    // $mail->Password = "php22023ngoc";
                    $mail->Password = "tltt gowm djfs kyfr";//Phplytest20@php
                    $mail->SMTPSecure = "tls";  // ssl
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "587";// 465
                    $mail->From='hahuydatkg56565@gmail.com';
                    $mail->FromName='Dat';
                    // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                    $mail->AddAddress($email, 'reciever_name');
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body    = 'Cấp lại mã code '.$code.'';
                    if($mail->Send())
                    {
                        echo '<script> alert("Check Your Email and Click on the 
                        link sent to your email");</script>';
                        include "./View/resetpw.php";
                    }
                    else
                    {
                        echo "Mail Error - >".$mail->ErrorInfo;
                        include "./View/forgetpassword.php";
                    }
                    // include "./View/resetpw.php";
                }
                else
                {
                    echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                    include "./View/forgetpassword.php";
                }
            }
            break;
            case 'resetpass':
            //Nhận code vừa nhập về
            if(isset($_POST['submit_password'])){
                $codeId=$_POST['password'];//884
                foreach ($_SESSION['email'] as $key =>$item){
                    if($item['id']==$codeoId)
                    {
                        $saltF="G456#@";
                        $saltL="Fa34%!";
                        $passnew=md5($saltF.$codeoId.$saltL);
                        $emailold=$item['$email'];
                        //Viết pt update
                        $usr=new user();
                        $usr->getPassNew($emailold,$passnew);
                    }
                }
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
            break;
    }
?>