$(".class_li_side_bar").click(function() {
    $(this).parents(".sidebar_item_kep").find(".sidebar_sub").toggleClass("active");
});
(function(w) {
    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left'),
            btn_right = document.getElementById('turn_right'),
            content = document.getElementById('bang_chung');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;
            }
            content.scrollLeft = content_scoll_left;
        });
    });
})
(window);
(function(w) {
    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left8'),
            btn_right = document.getElementById('turn_right8'),
            content = document.getElementById('bang_chung8');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;
            }
            content.scrollLeft = content_scoll_left;
        });
    });
})
(window);
(function(w) {
    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left2'),
            btn_right = document.getElementById('turn_right2'),
            content = document.getElementById('bang_chung2');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;
            }
            content.scrollLeft = content_scoll_left;
        });
    });
})
(window);
(function(w) {
    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left3'),
            btn_right = document.getElementById('turn_right3'),
            content = document.getElementById('bang_chung3');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;
            }
            content.scrollLeft = content_scoll_left;
        });
    });
})
(window);(function(w) {
    w.addEventListener('load', function() {
        const btn_left = document.getElementById('turn_left4'),
            btn_right = document.getElementById('turn_right4'),
            content = document.getElementById('bang_chung4');
        const content_scroll_width = content.scrollWidth;
        let content_scoll_left = content.scrollLeft;
        btn_right.addEventListener('click', () => {
            content_scoll_left += 100;
            if (content_scoll_left >= content_scroll_width) {
                content_scoll_left = content_scroll_width;
            }
            content.scrollLeft = content_scoll_left;
        });
        btn_left.addEventListener('click', () => {
            content_scoll_left -= 100;
            if (content_scoll_left <= 0) {
                content_scoll_left = 0;
            }
            content.scrollLeft = content_scoll_left;
        });
    });
})
(window);

$(".phieudanhgia .js_thanhvien").click(function() {
    $(".show_thanhvien").show();
    $(".text_js").text("Người đánh giá");
});
$(".js_menu_curd").click(function() {
    $(this).parents('.chitiet_phongban ').find(".show_menu_curd").toggle();
});
$(".js_menu_curd2").click(function() {
    $(this).parents('.tung_yc').find(".show_menu_curd2").toggle();
});
$(".x_close").click(function() {
    $(".show_thanhvien").hide();
    $(".show_chinhsuachucvu").hide();
    $(".show_themyccv").hide();
    $(".show_xacnhan").hide();
});
$(".x_close").click(function() {
    $(".popup").addClass("hidden");
    $(".popup").removeClass("flex");
});
$(".close").click(function() {
    $(".popup").addClass("hidden");
    $(".popup").removeClass("flex");
});
$(".close_xacnhan").click(function() {
    $(".popup_xacnhan").addClass("hidden");
    $(".popup_xacnhan").removeClass("flex");
});

function hienpopup(tenclass) {
    $("." + tenclass).show();
};

function hienpopupid(tenid) {
    $("#" + tenid).removeClass("hidden");
};
$(".js_anbot").click(function() {
    $(".show_js_anbot").slideToggle("slow");
    $(".js_chitiet").removeClass("hidden");
    $(".js_anbot").addClass("hidden");
    $(".js_nx_ct").addClass("br-10");
});
$(".js_chitiet").click(function() {
    $(".show_js_anbot").slideToggle("slow");
    $(".js_chitiet").addClass("hidden");
    $(".js_anbot").removeClass("hidden");
    $(".js_nx_ct").removeClass("br-10");
});

$(document).mouseup(function(e) {
    var container1 = $(".js_menu_curd2");
    var container = $(".js_menu_curd");
    if (!container.is(e.target) && container.has(e.target).length === 0 && !container1.is(e.target) && container1.has(e.target).length === 0) {
        $(".show_menu_curd").hide();
        $(".show_menu_curd2").hide();
    }
});



function xoa_phanloai() {
    $('.xoaphanloai').click(function() {
        $(this).parents('.khoiphanloaicon').find('.khoiphanloaiconcon').remove();
    });
};
$('.xoaphanloai').click(function() {
    $(this).parents('.khoiphanloaicon').find('.khoiphanloaiconcon').remove();
});
$('.js_checkbox').click(function() {
    if ($('.js_checkbox').is(':checked')) {
        $('.tongso_xoavv').removeClass("hidden");
        $('.tongso_khoiphuc').removeClass("hidden");

    } else {
        $('.tongso_xoavv').addClass("hidden");
        $('.tongso_khoiphuc').addClass("hidden");
    }

});
$(document).ready(function() {
    $('.js_xuatexcel').css("margin-top", "0px");
    
});

            /**************************VALIDATE*************************/
//End Thang diem/

//Lotrinh
$('#show_suachucvu').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".bot-15"));
        error.wrap("<span class='error'>");
     
    },
    
    rules: {
        ten_chucvu: "required", 
        vitri_chucvu: "required",   
    },
    messages: {
        ten_chucvu: "Không được để trống",
        vitri_chucvu: "Không được để trống",
    },

});
$('#show_themyccv').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".bot-15"));
        error.wrap("<span class='error'>");
     
    },
    
    rules: {
        ten_congviec: "required", 
        vitri_congviec: "required",   
        mota_congviec: "required",   
    },
    messages: {
        ten_congviec: "Không được để trống", 
        vitri_congviec: "Không được để trống",   
        mota_congviec: "Không được để trống",
    },

});
//End lo trinh

//Phieudanhgia
$('#frm_thietlaptime').validate({
    errorPlacement: function(error, element) {
        error.appendTo(element.parents(".bot-15"));
        error.wrap("<span class='error'>");
     
    },
    
    rules: {
        "ngay_bd":{
           required: true,
           date: true,
           
        }, 
        "ngay_kth":{
               required: true,
               date: true,
        }, 
},
    messages: {
        "ngay_bd":{
           required: "Không được để trống",
           date: "Định dạng ngày không đúng",
        }, 
        "ngay_kth":{
               required: "Không được để trống",
               date: "Định dạng ngày không đúng",
        }, 
    },

});
//End Phieudanhgia


