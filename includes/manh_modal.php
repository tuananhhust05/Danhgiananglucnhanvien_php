
<div id="popup_thanhcong" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/done.png" alt="Thành công">
                </div>
                <div class="flex center-center top-36 ">
                    <p class="size-15 change_text_tc  text-center"></p>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_thatbai" class="popup_xacnhan hidden">
    <div class=" pop">
        <div class="nentrang br-10">
            <div class="boder_thanhcong">
                <div class="flex center-center">
                    <img src="../img/manhimg/errol.png" alt="Thất bại">
                </div>
                <div class="flex center-center top-36 ">
                    <div class="size-15 change_text_tb  text-center"></div>
                </div>
                <div class="flex center-center top-36 nenxanh-chutrang close_xacnhan c-pointer">
                    <p class="size-15">Đóng</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popup_before" class="popup hidden ">
    <div class="pop ">
        <div class="nenxanh-chutrang br-t-10 flex center-center padding15">
            <div class="changesize18">
                <h4 class="size-18 font-bold h4_change"></h4>
            </div>
            <div class="flex center-height c-pointer x_close">
                <img src="../img/manhimg/x.png" alt="Huong dan">
            </div>
        </div>
        <div class="nentrang br-b-10">
            <div class="boder_pop_before">
                <div class="text-center size-15 text_before_change bot-5"></div>

                <div class="khoibutton_form top-70">
                    <div onclick="hienpopupid('popup_thatbai')"
                        class="btn close btn-nentrang-chuxanh br-5 vienxanh font-medium size-15 c-pointer btnhuy_before">
                        Hủy
                    </div>
                    <div onclick="hienpopupid('popup_thanhcong')"
                        class="btn close btn-nenxanh-chutrang br-5 vienxanh font-medium size-15 c-pointer btnluu_before">
                        Đồng ý
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>