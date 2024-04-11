<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">

                            <?php
                            //Truyền qua id=21
                            if (isset($_GET['id'])) {
                                $id = $_GET['id']; //Nhận được 21
                                //View đòi hỏi là phải có thông tin của id=21 thì mới hiển thị lên
                                $hh = new hanghoa();
                                $sp = $hh->getHangHoaId($id);
                                //Vị trả về đúng 1 object nên không fetch $sp=array(mahh:21, tenhh:giày...)
                                $tenhh = $sp['tenhh'];
                                $mota = $sp['mota'];
                                $dongia = $sp['dongia'];
                            }
                            ?>
                            <?php
                            $hinh = $hh->getHangHoaHinh($id);
                            //Trả về 3 hình, nhưng muốn lấy hình đầu tiên
                            $set = $hinh->fetch(); //fetch để lấy chỉ dòng đầu
                            ?>
                            <div class="tab-pane active" id=""><img
                                    src="Content\imagetourdien\<?php echo $set['hinh']; ?>" alt="" width="200px"
                                    height="350px">
                            </div>

                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                            while ($img = $hinh->fetch()):
                                ?>
                                <li class="active"><a href="#<?php echo $img['hinh']; ?> " data-toggle="tab">
                                        <img src="<?php echo 'Content/imagetourdien/' . $img['hinh']; ?>"
                                            alt="Học thiết kế web bán hàng online"></a>
                                </li>
                                <?php
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                        <h3 class="product-title">
                            <?php echo $tenhh ?>
                        </h3>
                       
                            <p class="product-description">
                                <?php
                                echo $mota;
                                ?>
                            </p>
                            <h4 class="price">Giá bán:
                                <?php echo number_format($dongia); ?>đ
                            </h4>

                            <h5 class="colors">Màu:
                                <select name="mymausac" class="form-control" style="width:150px;">
                                    <?php
                                    $mau = $hh->getHangHoaMau($id);
                                    while ($set = $mau->fetch()):
                                        ?>
                                        <!--Lưa là lưu mà, hiển thị là hiển thị tên-->
                                        <option value="<?php echo $set['Idmau']; ?>">
                                            <?php echo $set['mausac']; ?>
                                        </option>
                                        <?php
                                    endwhile;
                                    ?>
                                </select><br>

                                <input type="hidden" name="size" id="size" value="0" />
                                Size áo:
                                <?php
                                $size = $hh->getHangHoaSize($id);
                                while ($set = $size->fetch()):
                                    ?>
                                    <button type="button" name="" onclick="chonsize(<?php echo $set['size']; ?>)"
                                        class="btn btn-default-hong btn-circle" id="hong"
                                        value="<?php echo $set['Idsize']; ?>">
                                        <?php echo $set['size']; ?>
                                    </button>
                                    <?php
                                endwhile;
                                ?>
                                </br></br>
                                Số Lượng:

                                <input type="number" id="soluong" name="soluong" min="1" max="100" value="1"
                                    size="10" />


                            </h5>

                            <div class="action">

                                <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal"
                                    data-target="#myModal">MUA NGAY
                                </button>

                                <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default"
                                        type="button"><span class="fa fa-heart"></span></button> </a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
    <!--Hiển thị star-->
    <from method="post" target="_self" id="ninForm_2">
        <input type="hidden" name="pid" id="ninPdt">
        <input type="hidden" name="stars" id="ninStar">

    </from>
</section>
<?php
if (isset($_SESSION['makh'])):
    ?>

    <p class="float-left"><b>BÌnh luận </b></p>
    <hr>
    </div>
    <form action="index.php>action=binhluan" method="post">
        <div class="row">

            <input type="hidden" name="txtmahh" value="<?php echo $id ?>" />
            <img src="Content/imagetourdien/people.png" width="50px" height="50px" ; />
            <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment"
                placeholder="Thêm bình luận">  </textarea>
            <input type="submit" name="submit" class="btn btn-primary" id="submitButton" style="float: right;"
                value="Bình Luận" />

        </div>

    </form>
    <div class="row">
        <p class="float-left"><b>Các bình luận</b></p>
        <?php
        $bl = new binhluan();
        $noidung = $bl->selectComment($id);
        while ($set = $noidung->fetch()):
            ?>
            <div class="col-12">
                <div class="row">
                    <img src="Content/imagetourdien/people.png" alt="" width="50px" height="50px">
                    <p>
                        <?php echo '<b>' . $set['username'] . '</b>:' . $set['content']; ?>
                    </p>
                </div>
            </div>
            <?php
        endwhile;
        ?>
        <hr>
    </div>
    <div class="row">
        <br />
    </div>
<?php
endif;
?>
</div>
</section>
