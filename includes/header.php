<?
$hd = ['/huong_dan.html'];
$tc = ['/'];
?>
<div class="header">
    <div class="nav">
        <a target="_blank" href="https://timviec365.vn/">
            <div class="logo">
                <img src="../img/logo.png" alt="timviec365.vn">
            </div>
        </a>
        <div class="menu">
            <ul class="menu-ul">
                <li class="menu-li "><a class="amneu amneu1 <?php echo (in_array($_SERVER['REDIRECT_URL'], $tc)) ? "gachchan" : "" ?>" href="/">Trang chủ</a></li>
                <li class="menu-li"><a class="amneu amneu2 <?php echo (in_array($_SERVER['REDIRECT_URL'], $hd)) ? "gachchan" : "" ?>" href="/huong_dan.html">Hướng dẫn</a></li>
                <li class="menu-li"><a target="_blank" class="amneu" href="https://timviec365.vn/blog/c247/danh-gia-nhan-vien">Tin tức</a></li>
            </ul>
            <div class="login-sign_in">
                <div class="login"><a href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html" class="font_ss16 font_wB color_w">Đăng
                        ký</a></div>
                <p class="quota">/</p>
                <div class="singn-in"><a href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html" class="font_ss16 font_wB color_w">Đăng
                        nhập</a> </div>
            </div>
        </div>
    </div>
    <div class="nav1024">
        <div class="drop">
            <img class="js-drop-menu1024" src="../img/nav_1.png" alt="">
            <div class="menu1024 js-show-menu1024">
                <a href="/trang_chu_sau_dang_nhap.html" class="menu-sl">
                    <img class="img-sl1" src="../img/nav_2.png" alt="">
                    <div class="text-sl1 ">Trang chủ</div>
                </a>
                <a href="/huong_dan.html" class="menu-sl">
                    <img class="img-sl1" src="../img/nav_3.png" alt="">
                    <div class="text-sl1">Hướng dẫn </div>
                </a>
                <a target="_blank" href="https://timviec365.vn/blog/c247/danh-gia-nhan-vien" class="menu-sl">
                    <img class="img-sl1" src="../img/nav_5.png" alt="">
                    <div class="text-sl1">Tin tức</div>
                </a>
                <a href="https://quanlychung.timviec365.vn/lua-chon-dang-ky.html" class="menu-sl">
                    <img class="img-sl1" src="../img/nav_4.png" alt="">
                    <div class="text-sl1">Đăng ký </div>
                </a>
                <a href="https://quanlychung.timviec365.vn/lua-chon-dang-nhap.html" class="menu-sl">
                    <img class="img-sl1" src="../img/nav_6.png" alt="">
                    <div class="text-sl1">Đăng nhập</div>
                </a>
            </div>
        </div>
        <div class="logo1024">
            <img src="../img/logo1024.png" alt="">
        </div>
    </div>
</div>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    var somenu_tdn = $('.js-drop-menu1024');
    $('.js-drop-menu1024').click(function() {
        $('.js-show-menu1024').slideToggle(300);
    })
    var menu = $('.js-show-menu1024');
    $(window).click(function(e) {

        if (!menu.is(e.target) && menu.has(e.target).length == 0 && !somenu_tdn.is(e.target) && somenu_tdn.has(e
                .target).length == 0) {
            menu.hide();
        }

    })
</script>