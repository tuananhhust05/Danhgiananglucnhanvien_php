var currentLocation = window.location.pathname;
var li_sidebar = $('.li_sidebar>a');
var li_sidebar_con = $('.li_sidebar_con>a');
li_sidebar.each(function() {
    var href = $(this).attr('href');
    if (href == currentLocation) {
        $(this).addClass('active');
    }
})

li_sidebar_con.each(function() {
    var href = $(this).attr('href');
    if (href == currentLocation) {
        $(this).addClass('active');
        $(this).parent().parent().addClass('show');
    }
    if ($(this).hasClass('active')) {
        $(this).parent().parent().addClass('show');
    }
})


$('.p_title_tn').click(function() {
    $('.p_title_tn').removeClass('active');
    $('.ds_tn_db').hide();
    var data_class = $(this).attr('data_class');
    $(this).addClass('active');
    $('.' + data_class).show();
})

$('.input_search_db').keyup(function() {
    var input = $(this).val();
    if (input != "") {
        $('.popup_md_danhba .box_show_search').show();
        $('.popup_md_danhba .list_item_tinnhan').css('height', ' 242px');
    } else {
        $('.popup_md_danhba .box_show_search').hide();
        $('.popup_md_danhba .list_item_tinnhan').css('height', ' 318px');
    }
})

var nut_show_tc = $('.nut_show_tc');
var list_bieu_tc = $('.list_bieu_tc');
nut_show_tc.click(function() {
    $(this).parents('.bieucam_tuychon').find('.list_bieu_tc').toggle();
})

var nut_show_tc2 = $('.nut_show_tc2');
var list_tuychon_tn = $('.list_tuychon_tn');
nut_show_tc2.click(function() {
    $(this).parents('.bieucam_tuychon').find('.list_tuychon_tn').toggle();
})

var popup_xem_tv_nt = $('.popup_xem_tv_nt');
$('.show_popup_xem_tv_nt').click(function() {
    popup_xem_tv_nt.show();
})

var delete_tn = $('.delete_tn');
var popup_del_tinnhan = $('.popup_del_tinnhan');
$('.delete_tn').click(function() {
    popup_del_tinnhan.show();
})
var thuhoi_tn = $('.thuhoi_tn');
var popup_thuhoi_tinnhan = $('.popup_thuhoi_tinnhan');
thuhoi_tn.click(function() {
    popup_thuhoi_tinnhan.show();
})
var chuyentiep_tn = $('.chuyentiep_tn');
var popup_chuyentiep_tn1 = $('.popup_chuyentiep_tn1');
chuyentiep_tn.click(function() {
    popup_chuyentiep_tn1.show();
})

$('.input_keyup').keyup(function() {
    var keyup = $(this).val();
    if (keyup != "") {
        $('.box_input_tn_ct .col_6').addClass('width_daira');
        $('.box_input_tn_ct .col_6:last-child').css('width', '41px');
        $('.box_input_tn_ct .col_6:last-child .img_abc').hide();
        $('.box_input_tn_ct .col_6:last-child .img_abc.img_abc_gui').show();
    } else {
        $('.box_input_tn_ct .col_6').removeClass('width_daira');
        $('.box_input_tn_ct .col_6:last-child').css('width', '50%');
        $('.box_input_tn_ct .col_6:last-child .img_abc').show();
        $('.box_input_tn_ct .col_6:last-child .img_abc.img_abc_gui').hide();
    }

})

$('.img_gui_tn').click(function() {
    var img_src = $(this).attr('src');
    $('.popup_show_full_img').show();
    $('.img_show_full').attr('src', img_src);
})

$('.close_show_full').click(function() {
    $('.popup_show_full_img').hide();
})

$('.label_mes').click(function() {
    $('.label_mes').removeClass('active');
    var class_mess = $(this).attr('data_class');
    $('.trc_ganday_ctn').hide();
    $(this).addClass('active');
    $('.' + class_mess).show();
})




function luachon_tv(input) {
    if (input.checked) {
        $data_id = $(input).attr('data-id');
        if ($data_id != "") {
            $them_pt = '<div class="item_ct_dchon"  >';
            $them_pt += '<div class="d_flex flex_column">';
            $them_pt += '<div class="img position_r">';
            $them_pt += '<img src="../img/img_ct.png" class="img_ct1" alt="">';
            $them_pt += '<label for="' + $data_id + '" class="label_x position_a d_flex space_around align_c">';
            $them_pt += '<img src="../img/label_x.png" alt="">';
            $them_pt += '</label>';
            $them_pt += '</div>';
            $them_pt += '<p class="p_name_chon text_c" user_id= ' + $data_id + '>Phúc</p>';
            $them_pt += '</div>';
            $them_pt += '</div>';
            //alert($them_pt);
            $(input).parents('.over_popup_ct').find('.list_chuyentiep_dc_c').append($them_pt);
        }
    } else {
        $data_id = $(input).attr('data-id');
        $("[user_id='" + $data_id + "']").parents('.item_ct_dchon').remove();
    }
}

$(".ckb_goiy1").change(function() {
    luachon_tv(this);
})


$('.show_popup_create_group_nt').click(function() {
    $('.popup_create_group_nt').show();
})
$('.ckb_goiy2').change(function() {
    luachon_tv(this);
})

$('.ckb_goiy3').change(function() {
    luachon_tv(this);
})

var popup_doiten = $('.popup_doiten');
var edit_name_goinho = $('.edit_name_goinho');
edit_name_goinho.click(function() {
    popup_doiten.show();
})

$('.btn_change_name').click(function() {
    var name_input = $('.name_input').text();
    $('.name_output').val(name_input);
    $('.edit_name').show();
    $('.edit_name_sub').hide();
})

$('.sub_change_name').click(function() {
    $('.edit_name_sub').show();
    $('.edit_name').hide();
    var name_output = $('.name_output').val();
    $('.name_input').text(name_output);
})


$('.form-control-tn').keyup(function() {
    var value_text = $(this).val();
    if (value_text != "") {
        $(this).parents('.right_ctnf').find('.send_messi').addClass('da_onkeyup');
    } else {
        $(this).parents('.right_ctnf').find('.send_messi').removeClass('da_onkeyup');
    }

})

$('.start_ghiam').click(function() {
    $(this).parents('.right_ctnf').find('.send_messi').addClass('da_onkeyup');
    $('.xoa_ban_ghi_am ').show();
})



var item_sidebar_cha = $('.item_sidebar_cha');
item_sidebar_cha.click(function() {
    $('.ul_sidebar_con').each(function() {
        if ($(this).hasClass('da_show')) {
            $(this).hide();
            $(this).removeClass("da_show");
        }
    })
    $(this).parents('.li_sidebar').find('.ul_sidebar_con').show();
    $(this).parents('.li_sidebar').find('.ul_sidebar_con').addClass("da_show");
})

var icon_nhacnho = $('#icon_nhacnho');
var icon_thongbao = $('#icon_thongbao');
var popup_thongbao = $('#popup_thongbao');
var popup_nhacnho = $('#popup_nhacnho');
var btn_logout = $('.btn_logout');
var popup_logout = $('.modal_menu_header');
var icon_nhantin = $('#icon_nhantin');
var popup_tinnhan = $('#popup_tinnhan');
icon_nhacnho.click(function() {
    popup_nhacnho.toggle();
})

icon_thongbao.click(function() {
    popup_thongbao.toggle();
})
btn_logout.click(function() {
    popup_logout.toggle();
})
icon_nhantin.click(function() {
    popup_tinnhan.toggle();
})

var tin_nhan = $('#tin-nhan');
var show_icon_nhacnho = $('.show_icon_nhacnho');
show_icon_nhacnho.click(function() {
    popup_tinnhan.hide();
    tin_nhan.show();
})

$('.hide_nn_tb').click(function() {
    tin_nhan.hide();
})


var popup_ctaonhom_tn = $('.popup_ctaonhom_tn');

$('.hide_nn_tb').click(function() {
    popup_thongbao.hide();
    popup_nhacnho.hide();
    popup_tinnhan.hide();

})

$('.btn_huy1').click(function() {
    $('.popup_del_tinnhan').hide();
    $('.popup_thuhoi_tinnhan').hide();
    popup_ctaonhom_tn.hide();

})

$('.close_detl1').click(function() {
    $('.popup_chuyentiep_tn').hide();
    popup_ctaonhom_tn.hide();
    popup_doiten.hide();
})


var show_sidebar_abc = $('.show_sidebar_abc');
var sidebar = $('.sidebar');
show_sidebar_abc.click(function() {
    sidebar.slideToggle(400);
})

$(window).click(function(e) {
    if (!popup_logout.is(e.target) && popup_logout.has(e.target).length == 0 && !btn_logout.is(e.target) && btn_logout.has(e.target).length == 0) {
        popup_logout.hide();
    }
    if (!icon_nhacnho.is(e.target) && icon_nhacnho.has(e.target).length == 0 && !popup_nhacnho.is(e.target) && popup_nhacnho.has(e.target).length == 0) {
        popup_nhacnho.hide();
    }

    if (!icon_thongbao.is(e.target) && icon_thongbao.has(e.target).length == 0 && !popup_thongbao.is(e.target) && popup_thongbao.has(e.target).length == 0) {
        popup_thongbao.hide();
    }

    if (!icon_nhantin.is(e.target) && icon_nhantin.has(e.target).length == 0 && !popup_tinnhan.is(e.target) && popup_tinnhan.has(e.target).length == 0) {
        popup_tinnhan.hide();
    }

    if ($(e.target).is(".popup_logout")) {
        popup_logout.hide();
    }

    if ($(e.target).is(".popup_xoa")) {
        $('.popup_xoa').hide();
    }

    if ($(e.target).is(".popup_chuyentiep_tn")) {
        $('.popup_chuyentiep_tn').hide();
    }



    if ($(e.target).is(".popup_ctaonhom_tn")) {
        popup_ctaonhom_tn.hide();
    }

    if ($(e.target).is(".popup_doiten")) {
        popup_doiten.hide();
    }


    if (!nut_show_tc.is(e.target) && nut_show_tc.has(e.target).length == 0 && !list_bieu_tc.is(e.target) && list_bieu_tc.has(e.target).length == 0) {
        list_bieu_tc.hide();
    }

    if (!nut_show_tc2.is(e.target) && nut_show_tc2.has(e.target).length == 0 && !list_tuychon_tn.is(e.target) && list_tuychon_tn.has(e.target).length == 0) {
        list_tuychon_tn.hide();
    }


})


if ($(window).width() < 1024) {

    $(window).click(function(e) {

        if (!show_sidebar_abc.is(e.target) && show_sidebar_abc.has(e.target).length == 0 && !sidebar.is(e.target) && sidebar.has(e.target).length == 0) {
            sidebar.hide();
        }
    })
}


if ($(window).width() < 769) {
    var fuln_meag = $('.fuln_meag ');
    var mesag_left = $('.mesag_left');
    var mesag_right = $('.mesag_right');
    fuln_meag.click(function() {
        mesag_left.hide();
        mesag_right.show();
    })

    var back_mesag_left = $('.back_mesag_left');
    back_mesag_left.click(function() {
        mesag_left.show();
        mesag_right.hide();
    })

}