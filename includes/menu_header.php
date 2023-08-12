
<div class="header_right d_flex flex_end align_c">
    <div class="header_icon_left">
        <div class="img_icon show_sidebar_abc cursor">
            <img src="../img/nav_1.png" alt="menu">
        </div>
    </div>
    <div class="flex_grow1024"></div>
    <div class="header_icon d_flex align_c ">
        <div class="icon_thongbao" id="icon_nhantin">
            <div class="img_icon position_r">
                <img src="../img/nav_11.png" alt="tin nhắn" class="img_1024">
                <img src="../img/icon_tinnhan.png" alt=" tin nhắn" class="img_pc">
                <span class="sl_tb color_t position_a d_flex align_c space_around">2</span>
            </div>
        </div>
        <div class="icon_thongbao" id="icon_nhacnho">
            <div class="img_icon position_r ">
                <img src="../img/nav_12.png" alt="nhắc nhở" class="img_1024">
                <img src="../img/icon_nhacnho.png" alt="nhắc nhở" class="img_pc">
                <span class="sl_tb color_t position_a d_flex align_c space_around">2</span>
            </div>
        </div>
        <div class="icon_thongbao" id="icon_thongbao">
            <div class="img_icon position_r ">
                <img src="../img/nav_13.png" alt="thông báo" class="img_1024">
                <img src="../img/icon_thongbao.png" alt="thông báo" class="img_pc">
                <span class="sl_tb color_t position_a d_flex align_c space_around">2</span>
            </div>
        </div>
        <div class="header_tt position_r">
            <div class="logout btn_logout d_flex align_c">
                <div class="d_flex align_c img_pc">
                    <?php if ($_SESSION['quyen']==2): ?>
                        <?php if ($_SESSION['ep_image']!=""): ?>
                            <img src="https://chamcong.24hpay.vn/upload/employee/<?=$_SESSION['ep_image'];?>" alt="anhr" class="mr_8 wh32 br50 ">
                        <?php endif ?>

                        <?php if ($_SESSION['ep_image']==""): ?>
                            <img src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="anhr" class="mr_8 wh32 br50 ">
                        <?php endif ?>
                    <?php endif ?>
                    
                    <?php if ($_SESSION['quyen']==1): ?>
                        <?php if ($_SESSION['com_logo']!=""): ?>
                            <img src="https://chamcong.24hpay.vn/upload/company/logo/<?=$_SESSION['com_logo'];?>" alt="công ty" class="mr_8 wh32 br50 ">
                        <?php endif ?>
                        <?php if ($_SESSION['com_logo']==""): ?>
                            <img src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="công ty" class="mr_8 wh32 br50 ">
                        <?php endif ?>
                    <?php endif ?>
                    

                    <p class="font_ss16 position_r mr_12"><? if($_SESSION['quyen']==2) echo $_SESSION['ep_name'];else echo $_SESSION['com_name']?></p>
                    <p class="font_ss16 font_w5 mr_8"><?if($_SESSION['quyen']==2) echo $_SESSION['ep_id'];else echo $_SESSION['com_id']?></p>
                    <img src="../img/icon_so.png" alt="Chọn">
                </div>
                <img src="../img/nav_14.png" alt="logout" class="img_1024">
            </div>
            <div class="modal_d modal_menu_header position_a">
                <div class="container">
                    <div class="item">
                        <img src="../img/menu_1.png" alt="Thông tin tài khoản">
                        <a class="color_b" href="https://quanlychung.timviec365.vn/quan-ly-thong-tin-tai-khoan-nhan-vien.html">Thông tin tài khoản</a>
                        
                    </div>
                    
                    <div class="item">
                        <img src="../img/menu_3.png" alt="Báo lỗi">
                        <p>Báo lỗi</p>
                    </div>
                    <div class="item">
                        <img src="../img/menu_4.png" alt="Hướng dẫn">
                        <a href="/huong_dan.html" class="color_b">Hướng dẫn</p>
                    </div>
                    <div class="item">
                        <img src="../img/menu_5.png" alt="Đăng xuất">
                        <a href="/dang-xuat.html" class="color_b">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="popup_tb_nc position_a" id="popup_thongbao">
    <div class=" border_r10">
        <div class="popup_tb_nc_header d_flex space_b ">
            <p class="p_title_tb color_x font_w500">Thông báo</p>
            <span class="dau_x d_flex align_c hide_nn_tb"><img src="" alt=""></span>
        </div>
        <div class="popup_tb_nc_body">
            <div class="popup_tb_nn_main">
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Nhóm bán hàng 1]</p>
                        <p class="p_tb_nn2 color_x"><b class="font_w500">Nguyễn Trần Trung Quân </b>
                            vừa tạo 1 đơn hàng <b class="font_w500">DH000001</b></p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Nhóm bán hàng 1]</p>
                        <p class="p_tb_nn2 color_x"><b class="font_w500">Nguyễn Trần Trung Quân </b>
                            vừa tạo 1 đơn hàng <b class="font_w500">DH000001</b></p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Nhóm bán hàng 1]</p>
                        <p class="p_tb_nn2 color_x"><b class="font_w500">Nguyễn Trần Trung Quân </b>
                            vừa tạo 1 đơn hàng <b class="font_w500">DH000001</b></p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Nhóm bán hàng 1]</p>
                        <p class="p_tb_nn2 color_x"><b class="font_w500">Nguyễn Trần Trung Quân </b>
                            vừa tạo 1 đơn hàng <b class="font_w500">DH000001</b></p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Nhóm bán hàng 1]</p>
                        <p class="p_tb_nn2 color_x"><b class="font_w500">Nguyễn Trần Trung Quân </b>
                            vừa tạo 1 đơn hàng <b class="font_w500">DH000001</b></p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup_tb_nc_footer back_w ">
            <p class="font_14 line_h16 color_blue p_tb_nc_footer text_c">Đánh dấu đã xem tất cả</p>
        </div>
    </div>
</div>
<div class="popup_tb_nc position_a" id="popup_nhacnho">
    <div class=" border_r10">
        <div class="popup_tb_nc_header d_flex space_b align_c back_w">
            <p class="p_title_tb color_x font_w500">
                Nhắc nhở
            </p>
            <span class="dau_x d_flex align_c hide_nn_tb"><img src="" alt=""></span>
        </div>
        <div class="popup_tb_nc_body">
            <div class="popup_tb_nn_main">
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Vấn đề]</p>
                        <p class="p_tb_nn2 color_x">Vấn đề <b class="font_w500">Bảo hành máy -
                                000001 </b> sắp quá hạn! </p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Kho]</p>
                        <p class="p_tb_nn2 color_x">Sản phẩm <b class="font_w500">Bánh mì - 0000001 </b> trong kho sắp
                            hết! </p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Vấn đề]</p>
                        <p class="p_tb_nn2 color_x">Vấn đề <b class="font_w500">Bảo hành máy - 000001 </b> sắp quá hạn!
                        </p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Kho]</p>
                        <p class="p_tb_nn2 color_x">Sản phẩm <b class="font_w500">Bánh mì - 0000001 </b> trong kho sắp
                            hết! </p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Vấn đề]</p>
                        <p class="p_tb_nn2 color_x">Vấn đề <b class="font_w500">Bảo hành máy - 000001 </b> sắp quá hạn!
                        </p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
                <div class="item_tb_nn d_flex space_b ">
                    <div class="imgitem_tb_nn  ">
                        <img src="" alt="">
                    </div>
                    <div class="text_item_tb_nn">
                        <p class="p_tb_nn1 color_x font_w500">[Kho]</p>
                        <p class="p_tb_nn2 color_x">Sản phẩm <b class="font_w500">Bánh mì - 0000001 </b> trong kho sắp
                            hết! </p>
                        <p class="p_tb_nn_time ">8:00, 20/05/2021</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup_tb_nc_footer back_w ">
            <p class="font_14 line_h16 color_blue p_tb_nc_footer text_c">Đánh dấu đã xem tất cả</p>
        </div>
    </div>
</div>
<div class="popup_tb_nc position_a" id="popup_tinnhan">
    <div class=" border_r10">
        <div class="popup_tb_nc_header d_flex space_b align_c back_w">
            <div class="d_flex flex_start">
                <p class="p_title_tn color_x font_w500 cursor active" data_class='popup_md_tinnhan'>
                    Tin nhắn
                </p>
                <p class="p_title_tn color_x font_w500 cursor" data_class='popup_md_danhba'>
                    Danh bạ
                </p>
            </div>
            <div class="d_flex flex_start">
                <a class="dau_x d_flex align_c cursor show_trangtin" href="nhan-tin.html" target='_blank'><img src=""
                        alt="" target="_blank"></a>
                <span class="dau_x d_flex align_c cursor hide_nn_tb"><img src="" alt=""></span>
            </div>
        </div>
        <div class="popup_md_tinnhan ds_tn_db">
            <div class="box_modal_tinnhan">
                <div class="search_tn_md">
                    <div class="position_r w_100">
                        <input type="text" class="input_search_md" placeholder="Tìm kiếm trên chat">
                        <span class="span_ababab"></span>
                    </div>
                </div>
                <p class="cuoc_tr_ch color_x font_s16 line_h19">Trò chuyện gần đây</p>
                <div class="list_item_tinnhan">
                    <div class="item_tinnhan d_flex show_icon_nhacnho ">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_v d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                    <div class="item_tinnhan d_flex show_icon_nhacnho">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                            <span class="position_a tn_status d_flex space_around align_c back_w">
                                <span class="back_green d_flex"></span>
                            </span>
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                            <p class="mess">hello word</p>
                        </div>
                        <div class="d_flex thoigian">
                            <p>10:07 AM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup_md_danhba ds_tn_db">
            <div class="box_modal_tinnhan">
                <div class="search_tn_md">
                    <div class="position_r w_100">
                        <input type="text" class="input_search_md input_search_db" placeholder="Tìm kiếm trên chat">
                        <span class="span_ababab"></span>
                    </div>
                </div>
                <div class="box_show_search">
                    <div class="d_flex space_b align_c box_text_db">
                        <p class="p_danhba1 color_x">Kết quả</p>
                        <p class="color_r p_danhba2">Hủy lọc</p>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                </div>
                <div class="list_item_tinnhan">
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>

                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                    <div class="item_tinnhan item_tn_db d_flex align_c">
                        <div class="img_tn position_r">
                            <img src="" alt="">
                        </div>
                        <div class="tinnhan_modal">
                            <p class="name">Haha madrid</p>
                        </div>
                        <div class="d_flex thoigian align_c ">
                            <span class="status_to d_flex back_v"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup_footer_tn back_w ">
            <p class="font_14 line_h16 color_x font_wB text_c">Xem tất cả trong tin nhắn</p>
        </div>
    </div>
</div>
</div>