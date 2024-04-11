<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="./Content/CSS/Tour.css" rel="stylesheet" />
<header class="row no-gutters">
    <!-- nav san pham -->
    <section class="col-12" style="height:40px;">
        <div class="col-12" >
            <div class="row">

                <!-- test -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top scrolling-navbar" style="margin-bottom: 0px;">

                    <div class="collapse navbar-collapse" id="basicExampleNav">

                        <!-- Links -->
                        <ul class="navbar-nav mr-auto smooth-scroll">
                            
                        </ul>
                    </div>
                </nav>
                <!-- end test -->
            </div>
        </div>

    </section>
    <!-- dang ky -->
    <section class="col-12">
        
       
            <div class="col-12">
                <div class="row">
                    <nav class="navbar navbar-expand-lg n navbar-light bg-light" style="margin-bottom: 0px; ">

                        <!-- Right -->
                        <ul class="navbar-nav ml-auto">
                            <li>
                                <form class="form-inline" action="index.php?action=sanpham&act=timkiem" method="post">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <!-- <a href="Trangchu.php?trang=tk"> -->
                                            <input class="input-group-text" style="height: 35px;" type="submit" id="btsearch" value="Tìm Kiếm"/>
                                        <!-- </a> -->
                                            <!-- <span class="input-group-text">@</span> -->
                                            <input type="text" name="txtsearch" class="form-control" placeholder="Tìm Kiếm"/>
                                        </div>

                                </form>
                            </li>
                            <?php 
                            if (!isset($_SESSION['makh'])){
                            ?>
                            <li class="nav-item">
                                <a href="index.php?action=dangky" class="nav-link">Đăng ký</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?action=dangnhap" class="nav-link">Đăng nhập</a>
                            </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item">
                                <a href="index.php?action=dangxuat" class="nav-link">Đăng Xuất</a>
                            </li>
                            <li>
                                <a href="index.php?action=giohang" class="nav-link"><img src="./Content/imagetourdien/cartx2.png" width="30px" height="30px" alt=""></a>
                            </li>
                            <li>
                                <p style="color: red; margin-top: 20px; margin-left: 0px;">(0)</p>

                            </li>
                            <?php
                            if(isset($_SESSION['makh'])){
                                echo '<li>
                                <p style="color:red; margin-top:20px;margin-left:0px;">'.$_SESSION['tenkh'].'</p>
                                </li>';
                            }else{
                                echo '<li>
                                <p style="color:red; margin-top:20px;margin-left:0px;">Xin chào!</p>
                                </li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
       
            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="index.php?action=dangnhap">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=dangky">Đăng ký</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="index.php?action=dangxuat">Đăng xuất</a></li>
                        
                        
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav> -->


    </section>


</header>
<!-- dang ky -->

<!-- hinh dộng -->
<div class="row">

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>

                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner z-depth-1-half" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./Content/imagetourdien/9011583723026.png" style="height: 500px;" alt=" First slide">
                        </div>
                        <!--/First slide-->
                        <!--Second slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./Content/imagetourdien/9521594005272.png" style="height: 500px;" alt="Second slide">
                        </div>
                        <!--/Second slide-->
                        <!--Third slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./Content/imagetourdien/9541596012726.png" style="height: 500px;" alt="Third slide" >
                        </div>

                        <!--/Third slide-->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </div>
        </div>
       
    </div>
</div>