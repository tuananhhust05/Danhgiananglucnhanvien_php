<?
include('config.php');
if (!in_array(2, $quyen_kiemtra)) {header("Location: /trang_chu_sau_dang_nhap.html");};
if ($_SESSION['quyen']==1){
    $_SESSION['ep_id']=$usc_id;
    $_SESSION['ep_name']=$_SESSION['com_name'];
}
$id = getValue("id","int","GET",0);
$query= new db_query("SELECT * FROM de_kiemtra_cauhoi where id = '".$id."'");
$info = mysql_fetch_assoc($query->result);
$list_cauhoi=explode(',',$info['danhsach_cauhoi']);

$query= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and (hinhthuc=2 or hinhthuc=3) and id_congty=".$usc_id."");
$tracnghiem = $query->result_array();

$query2= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and hinhthuc=1 and id_congty=".$usc_id."");
$tuluan = $query2->result_array();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Chỉnh sửa đề kiểm tra năng lực</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/dat.css">
    <style>
    .select2-container .select2-selection--multiple{
    	min-height: 184px;
    }
    .select2-container--default .select2-selection--multiple{
    	border: 1px solid #ccc;
    }
    .select2-container .select2-search--inline .select2-search__field {
	    font-size: 14px;
	    margin-top: 10px;
	    margin-left: 15px;
	}
    input[type="radio"] { 
		outline: none;
		cursor: pointer;
	}
	input[type="number"] { 
		outline: none;
		cursor: pointer;
	}input[type="text"] { 
		outline: none;
		cursor: pointer;
	}
	input[type="checkbox"] { 
		outline: none;
		cursor: pointer;
	}
		.body_ql_tieuchi .tieu_chi {
	     min-width: 100%; 
	}
	.ql_tieuchi_m {
		width: 100%;
	}
	.popup_680 .khoibang_2 .bangchung_2 {
    overflow-y: auto;
    padding-bottom: 0px;
	}
	.popup_680 .khoibang_2 .bangchung_2 {
    max-height: 300px;
	}
	.tx_gc{
          white-space: nowrap; 
          width: 100%; 
          overflow: hidden;
          text-overflow: ellipsis; 
        }
    .a_khoibang .khoibang .bangchung .bangchinh tr th:nth-child(2){
	    width: 444px;
	} 
	.a_khoibang .khoibang .bangchung .bangchinh td:nth-child(2){
		text-align: left;
	}   
    </style>
</head>

<body>
    <div id="ql_tieuchi_nangluc_chitiet" class="ql_tieuchi">
        <div class="wapper color_b">
            <div class="d_flex">
                <? include('../includes/cd_sidebar.php'); ?>
                <div class="main">
                    <div class="header back_w border_r10 w_100">
                        <div class="box_header d_flex space_b align_c position_r">
                            <div class="title_header">
                                <div class="d_flex"> <a href='/de-kiem-tra.html'
                                        class="img_quaylai mr_10">
                                        <img src="../img/icon_so.png" alt="Quay lại">
                                    </a>
                                    <p onclick="window.location.href='/de-kiem-tra.html'" class="c-pointer">Quản lý đề kiểm tra<span> / </span><span> Chỉnh sửa</span></p>
                                </div>
                            </div>
                            <? include('../includes/menu_header.php') ?>
                        </div>
                        <div class="main_body">
                            <div class="body_ql_tieuchi body_ql_tieuchi_chitiet mb_20">
                                <div class="title_header">
                                    <div class="d_flex"> <a href='/quan_ly_de_kiem_tra_nang_luc.html'
                                            class="img_quaylai mr_10">
                                            <img src="../img/icon_so.png" alt="Quay lại">
                                        </a>
                                        <p onclick="window.location.href='/de-kiem-tra.html'" class="c-pointer">Quản lý đề kiểm tra <span> / </span><span> Chỉnh sửa</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="header_d width_100">
                                    <h4>Chỉnh sửa đề kiểm tra</h4>
                                </div>
                                <div class="body width_100">
                                    <form onsubmit="return false" action="" method="post" enctype="multipart/form-data"
                                        class="form form_themmoi_de">
                                        <div class="container mb_20">
                                        	<div class="form_container">
                                                <div class="form_group">
                                                    <label for="">Hình thức tạo đề<span class="color_red">*</span></label>
                                                    <div class="select_no_muti ">
                                                        <select disabled name="" id="" class="js_select_2 loai_de  arr_cauhoi">
                                                            <option <?if($info['hinhthuc_taode']==1) echo'selected'; ?> value="1">Người dùng tự thiết lập</option>
                                                            <option <?if($info['hinhthuc_taode']==2) echo'selected'; ?> value="2">Hệ thống sinh đề theo điều kiện</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form_group ">
                                                    <label for="">Hình thức đề kiểm tra*</label>
                                                    <div class="select_no_muti ">
                                                        <select disabled name="" id="" class="js_select_2 hinhthuc_de  arr_cauhoi">
                                                            <option <?if($info['kt_loai']==1) echo'selected'; ?> value="1">Trắc nghiệm</option>
                                                            <option <?if($info['kt_loai']==2) echo'selected'; ?> value="2">Tự luận</option>
                                                            <option <?if($info['kt_loai']==3) echo'selected'; ?> value="3">Trắc nghiệm và tự luận</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form_container">
                                            	
                                                <div class="form_group nhaptende">
                                                    <label for="">Tên đề kiểm tra năng lực nhân viên<span
                                                            class="color_red">*</span></label>
                                                    <input type="text" class="ten" name="ten" placeholder="Nhập tên đề kiểm tra" value="<?=$info['ten_de_kiemtra']?>">
                                                </div>
                                                <div class="form_group form_group_block">
                                                    <label for="">Người tạo</label>
                                                    <input type="text" class="nguoi_tao" name="nguoi_tao "
                                                        value="<?php if ($info['congty_or_nv']!=1): ?><?=search($data_list_nv,'ep_id',$info['nguoitao'])[0]['ep_name']?><?php endif ?><?php if ($info['congty_or_nv']==1): ?><?=search($cty,'com_id',$info['nguoitao'])[0]['com_name']?><?php endif ?>">
                                                </div>
                                            </div>
                                            <div class="form_container">
                                                <div class="form_group form_group_block">
                                                    <label for="">Ngày tạo</label>
                                                    <input type="text" class="ngay_Tao" name="ngay_tao" value="<? $timestamp=$info['ngaytao'];echo(date("d/m/Y ", $timestamp)); ?>">
                                                </div>
                                                <div class="form_group form_group_block">
                                                    <label for="">Thang điểm <span class="color_red">*</span></label>
                                                    <input type="text" class="thangdiem_ht" name="" 
                                                        value="<?=$info['ch_thangdiem']?>">
                                                </div>
                                            </div>
                                            <div class="form_group">
                                                <label class="bot-5" for="">Ghi chú</label>
                                                <textarea id="editor1" name="ghi_chu" value=''><?=$info['ghichu']?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="dang_tracnghiem ">
	                                        <div class="mb_20 d_flex space_b width_100 align_c color_blue">
												<h4 class="font_ss16 font_wB">Danh sách câu hỏi trắc nghiệm</h4>
												<div class="btn_them_tracnghiem d_flex align_c cursor_p hieuung">
													<div class="img_themmoi_cauhoi">
		                                                <img src="../img/icon_plus.png" alt="Thêm mới">
		                                            </div>
		                                            <p class="color_blue font_s14 font_w5">Thêm câu hỏi</p>
												</div>
											</div>
											<div class="bang_tieuchi_danhgia mb_20">
												<div class="khoibang">
													<div class="bangchung">
														<table class="bangchinh tieu_chi tess">
															<tbody class="op_sp">
															<tr>
																<th>
																	<p class="phantucon">STT</p>
																</th>
																<th style="width: 60%;">
																	<p class="phantucon">Câu hỏi</p>
																</th>
																<th>
																	<p class="phantucon">Số điểm</p>
																</th>
																<th style="width: 15%;">
																	<p class="phantucon">Chức năng</p>
																</th>
															</tr>
															</tbody>
															
															<tr class="nentrang-chuden  ">
																<td colspan="2">
																	<p class="text_a_l"><span>Tổng điểm: </span>
																		<span class="tb_td_er color_red"></span>
																	</p>
																</td>
																<td class="show_tong_tracnghiem" colspan="2">0</td>
																
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
										
										<div class="dang_tuluan ">
	                                        <div class="mb_20 d_flex space_b width_100 align_c color_blue">
												<h4 class="font_ss16 font_wB">Danh sách câu hỏi tự luận</h4>
												<div class="btn_them_tuluan d_flex align_c cursor_p hieuung">
													<div class="img_themmoi_cauhoi">
		                                                <img src="../img/icon_plus.png" alt="Thêm mới">
		                                            </div>
		                                            <p class="color_blue font_s14 font_w5">Thêm câu hỏi</p>
												</div>
											</div>
											<div class="bang_tieuchi_danhgia mb_20">
												<div class="khoibang">
													<div class="bangchung">
														<table class="bangchinh tieu_chi tess">
															<tbody class="op_sp">
															<tr>
																<th>
																	<p class="phantucon">STT</p>
																</th>
																<th style="width: 60%;">
																	<p class="phantucon">Câu hỏi</p>
																</th>
																<th>
																	<p class="phantucon">Số điểm</p>
																</th>
																<th style="width: 15%;">
																	<p class="phantucon">Chức năng</p>
																</th>
															</tr>
															</tbody>
															
															<tr class="nentrang-chuden  ">
																<td colspan="2">
																	<p class="text_a_l"><span>Tổng điểm: </span>
																		<span class="tb_td_er color_red"></span>
																	</p>
																</td>
																<td class="show_tong_tracnghiem" colspan="2">0</td>
																
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>
										
                                        <div class="thiet_lap d_flex mb_20">
                                            <h4 class="color_blue font_wB font_ss16 mr_20">
                                                Thiết lập phân loại đánh giá:
                                            </h4>

                                            <div class="container_thietlap">
                                                <div class="d_flex align_c mr_3_flex align_c mr_30">
                                                    <input type="radio" name="drone" id="radio_macdinh" value="1"
                                                        class="mr_5 check_dm" checked>
                                                    <label for="huey">Mặc định</label>
                                                </div>
                                                <div class="d_flex align_c">
                                                    <input type="radio" name="drone" id="radio_khac" value="2"
                                                        class="mr_5 check_dm">
                                                    <label for="dewey">Khác</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_macdinh ">
                                            <div class="header_d width_100">
                                                <h4>Phân loại đánh giá</h4>
                                            </div>
                                            <div style="overflow: auto;" class="body width_100">
                                                <ul class="thongtin_tieuchi">
                                                    <?
                                                        foreach ($pl as $value) {
                                                            ?>
                                                            <li class="item">
                                                                <p><?
                                                                if($value[2]==1)echo "Yếu";
                                                                if($value[2]==2)echo "Trung bình";
                                                                if($value[2]==3)echo "Khá";
                                                                if($value[2]==4)echo "Giỏi";
                                                                if($value[2]==5)echo "Xuất sắc";
                                                            ?>:</p>
                                                                <p><span><?=$value[0]?></span> <span class="mr_10 ml_14">-></span>
                                                                    <span><?=$value[1]?></span>
                                                                </p>
                                                            </li>
                                                            <?
                                                        }
                                                    ?>
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>

	                                    <div class="body_ql_tieuchi phanloai_danhgia phanloai_danhgia_khac display_none">
	                                        <div class="header_d width_100">
	                                            <h4>Phân loại đánh giá</h4>
	                                        </div>

	                                        <div class="body width_100">
	                                            <div class="container_form_4_tong">
	                                                <div class="container_form_4 d_flex ">
	                                                <div class="form_group ">
	                                                    <label for="">Từ <span class="color_red">*</span></label>
	                                                    <input type="text" class="arr_tt_sp tu" name="tu_diem" placeholder="Nhập số điểm">
	                                                </div>
	                                                <div class="form_group ">
	                                                    <label for="">Đến<span class="color_red">*</span></label>
	                                                    <input type="text" class="arr_tt_sp den mc_den1" name="den_diem" placeholder="Nhập số điểm">
	                                                </div>
	                                                <div class="form_group ">
	                                                    <label for="">Loại<span class="color_red">*</span></label>
	                                                    <div class="select_no_muti ">
	                                                        <select class="js_select_2 arr_tt_sp loai" name="loai_danhgia">
	                                                            <option value="">Chọn loại</option>
	                                                            <option value="1">Yếu</option>
	                                                            <option value="2">Trung bình</option>
	                                                            <option value="3">Khá</option>
	                                                            <option value="4">Giỏi</option>
	                                                            <option value="5">Xuất sắc</option>
	                                                        </select>
	                                                    </div>
	                                                </div>
	                                                <div class="form_group form_btn d_flex content_c">
	                                                    <button type="button" class="btn btn_xoa_loai btn_trang">Xóa</button>
	                                                </div>
	                                            </div>
	                                            </div>
	                                            
	                                            <div data-num='1' class="themmoi_form themmoi_loai">
	                                                <div  class="btn btn_xanh ">
	                                                    <div class="img mr_10">
	                                                        <img src="../img/icon_plus.png" alt="Thêm mới">
	                                                    </div>
	                                                    <p>Thêm loại</p>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>

                                        <div class="btn_form_de  d_flex content_c mt_25">
                                            <div onclick="window.location.href='/de-kiem-tra.html'" class="btn_huy btn btn_168 btn_trang mr_68">
                                                Hủy
                                            </div>
                                            <button onclick="CKupdate()" type="submit" class="btn_tieptuc_1 btn btn_168 btn_xanh ">
                                                <div class="d_flex align_c ">
                                                    <p>Chỉnh sửa</p>
                                                </div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="popup popup_500 popup_thanhcong">
    <div class="container">
        <div class="popup_body">
            <div class="img">
                <img src="../img/popup_1.png" alt="thành công ">
            </div>
            <p class="text_a_c ">Chỉnh sửa đề kiểm tra <span class="font_wB show_xoa_ten"></span> thành
                công!</p>
            <div onclick="window.location.href='/de-kiem-tra.html'" class="popup_btn">
                <div class="btn btn_xanh close_popup ">
                    Đóng
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup popup_500 popup_thatbai_thongbao">
    <div class="container">
        <div class="popup_body">
            <div class="img">
                <img src="../img/popup_2.png" alt="thành công ">
            </div>
            <p class="text_a_c popup_thatbai_thongbao_text"> </p>
            <div class="popup_btn">
                <div  class="btn btn_xanh close_popup ">
                    Đóng
                </div>
            </div>
        </div>
    </div>
</div>

<!-- popuptrawsc nghiệm -->
<div class="p_man popup popup_680 popup_them_tracnghiem ">
	<div class="container">
		<div class="content">
			<div class="popup_header">
				<h4 class="name_header">Danh sách câu hỏi trắc nghiệm</h4>
				<div class="img close_popup">
					<img src="../img/close.png" alt="đóng">
				</div>
			</div>
			<div class="popup_body">
				<div class="thanh_search width_100 ">
					<div class="select_no_muti ql_tieuchi_m">
                        <select name="" id="" class="search_item js_select_2 search_value filter_tracnghiem">
                        	<option value="">Tìm kiếm theo tên câu hỏi</option>
                        	<?php foreach ($tracnghiem as  $value): ?>
                        		<?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                        		<option value="<?=$value['id'];?>"><?=$value['cauhoi']?></option>
                        	<?php endforeach ?>
	                    </select>
	                    <span class="see_search"></span>
                	</div>
				</div>
				<form action="" onsubmit="return false">
					<div class="container_khoibang">
						<div class="a_khoibang ">
							<div class="khoibang">
								<div class="bangchung bangchung_1 ">
									<table class="bangchinh">
										<tr>
											<th >
												<p class="phantucon">STT</p>
											</th>
											<th >
												<p class="phantucon">Câu hỏi</p>
											</th>
											<th >
												<p class="phantucon">Số điểm</p>
											</th >
											<th><input class="js_check_tracnghiem_tong" type="checkbox"></th>
										</tr>
									</table>
								</div>
							</div>
							<div class="khoibang khoibang_2">
								<div class="bangchung bangchung_2 ">
									<table class="bangchinh bang_tieuchi">
										<?php $stt=0; foreach ($tracnghiem as $value):$stt++; ?>
										<tr class="row_tracnghiem_pop_<?=$value['id']?> row_tracnghiem_chung">
											<td style="width: 60px">
												<p><?=$stt?></p>
											</td>

											<td>
												<?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
												<p class="elipsis1"><?=$value['cauhoi']?></p>
											</td>
											<td style="width: 124px;">
												<p><?=$value['sodiem']?></p>
											</td>
											<td style="width: 52px;">
												<input <?if(in_array($value['id'], $list_cauhoi)) echo 'checked'; ?> type="checkbox" class="js_checked js_check_tracnghiem_con id_tracnghiem_<?=$value['id']?>" value="<?=$value['id'];?>">
											</td>
										</tr>
										<?php endforeach ?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="popup_btn m_edit">
						<button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
						<button type="submit" class="btn btn_xanh btn_140 submit_add_tc " name="">
							Hoàn thành
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- popuptrawsc nghiệm -->

<!-- popup tuwj luaanj -->
<div class="p_man popup popup_680 popup_them_tuluan ">
	<div class="container">
		<div class="content">
			<div class="popup_header">
				<h4 class="name_header">Danh sách câu hỏi tự luận</h4>
				<div class="img close_popup">
					<img src="../img/close.png" alt="đóng">
				</div>
			</div>
			<div class="popup_body">
				<div class="thanh_search width_100 ">
					<div class="select_no_muti ql_tieuchi_m">
                        <select name="" id="" class="search_item js_select_2 search_value filter_tracnghiem">
                        	<option value="">Tìm kiếm theo tên câu hỏi</option>
                        	<?php foreach ($tuluan as  $value): ?>
                        		<?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
                        		<option value="<?=$value['id'];?>"><?=$value['cauhoi']?></option>
                        	<?php endforeach ?>
	                    </select>
	                    <span class="see_search"></span>
                	</div>
				</div>
				<form action="" onsubmit="return false">
					<div class="container_khoibang">
						<div class="a_khoibang ">
							<div class="khoibang">
								<div class="bangchung bangchung_1 ">
									<table class="bangchinh">
										<tr>
											<th >
												<p class="phantucon">STT</p>
											</th>
											<th >
												<p class="phantucon">Câu hỏi</p>
											</th>
											<th >
												<p class="phantucon">Số điểm</p>
											</th >
											<th><input class="js_check_tuluan_tong" type="checkbox"></th>
										</tr>
									</table>
								</div>
							</div>
							<div class="khoibang khoibang_2">
								<div class="bangchung bangchung_2 ">
									<table class="bangchinh bang_tieuchi">
										<?php $stt=0; foreach ($tuluan as $value):$stt++; ?>
										<tr class="row_tracnghiem_pop_<?=$value['id']?> row_tracnghiem_chung">
											<td style="width: 60px">
												<p><?=$stt?></p>
											</td>

											<td>
												<?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
												<p class="elipsis1"><?=$value['cauhoi']?></p>
											</td>
											<td style="width: 124px;">
												<p><?=$value['sodiem']?></p>
											</td>
											<td style="width: 52px;">
												<input <?if(in_array($value['id'], $list_cauhoi)) echo 'checked'; ?> type="checkbox" class="js_checked js_check_tuluan_con id_tuluan_<?=$value['id']?>" value="<?=$value['id'];?>">
											</td>
										</tr>
										<?php endforeach ?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="popup_btn m_edit">
						<button type="button" class="btn btn_trang btn_140  mr_68 close_popup">Hủy</button>
						<button type="submit" class="btn btn_xanh btn_140 submit_add_tl " name="submit_add_tl">
							Hoàn thành
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- popuptrawsc nghiệm -->
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/trangchung.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/dat.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</html>

<script>
	
$(document).ready(function(){
	$('.hinhthuc_de').trigger('change');
	$('.loai_de').trigger('change');
	$('.submit_add_tc').click();
	$('.submit_add_tl').click();
})	
$('.js_check_tracnghiem_tong').click(function(){
	if($('.js_check_tracnghiem_tong').prop('checked')) {
		$('.js_check_tracnghiem_con').prop('checked',true);
	} else {
		$('.js_check_tracnghiem_con').prop('checked',false);
	}
});
$('.js_check_tuluan_tong').click(function(){
	if($('.js_check_tuluan_tong').prop('checked')) {
		$('.js_check_tuluan_con').prop('checked',true);
	} else {
		$('.js_check_tuluan_con').prop('checked',false);
	}
});
$('.filter_tracnghiem').change(function(){
	var val=$(this).val();
	$('.row_tracnghiem_chung').hide();
	$('.row_tracnghiem_pop_'+val+'').show();
	if (val=="") $('.row_tracnghiem_chung').show();
})
$('.filter_loai').change(function(){
	var val=$(this).val();
	$('.row_loai_chung').hide();
	$('.row_loai_pop_'+val+'').show();
	if (val=="") $('.row_loai_chung').show();
})
active_single_menu('kt_tong');
active_single_menu_con('de_kt_menu');


$('.js_select_2').select2({
    width: '100%'
});
$('.chon_loaicauhoi').select2({
    width: '100%',
    placeholder:'Chọn loại câu hỏi',
});

var i=0;
CKEDITOR.replace('editor1', {
	height: '108'
});
CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;

$('.submit_add_tc').on("click",function () {
	$('.chungchung').remove();
	var str_id="";
	$('.popup_them_tracnghiem .js_check_tracnghiem_con').each(function(){
		if ($(this).is(":checked")) {
			str_id+=$(this).val()+","; 
		}
	});
	
	$('.popup_them_tieuchi').hide();
		$.ajax({
			url: '/render/themmoi_tracnghiem.php',
			type: 'POST',
			data: {
				str_id:str_id,
			},
			success: function(data){
				$('.dang_tracnghiem .op_sp').append(data);
				$('.popup_them_tracnghiem ').hide();
			}
		}); 
});
$('.submit_add_tl').on("click",function () {
	$('.chungchungtl').remove();
	var str_id="";
	$('.popup_them_tuluan .js_check_tuluan_con').each(function(){
		if ($(this).is(":checked")) {
			str_id+=$(this).val()+","; 
		}
	});
	
	$('.popup_them_tieuchi').hide();
		  $.ajax({
			url: '/render/themmoi_tuluan.php',
			type: 'POST',
			data: {
				str_id:str_id,
			},
			success: function(data){
				$('.dang_tuluan .op_sp').append(data);
				$('.popup_them_tuluan ').hide();
			}
		}); 
});
$('.btn_xoa_loai').click(function(){
    $(this).parents('.container_form_4').remove();
 })

$('.hinhthuc_de').change(function(){
	var val=$(this).val();
	$('.hinhthuc_de_ajax').val(val).trigger('change');
	if (val==1) {
		$('.dang_tracnghiem').show();
		$('.dang_tuluan').hide();
	}
	if (val==2) {
		$('.dang_tracnghiem').hide();
		$('.dang_tuluan').show();
	}
	if (val==3) {
		$('.dang_tracnghiem').show();
		$('.dang_tuluan').show();
	}
})
$('.select_loai_tuluan').select2({
    placeholder:'Chọn loại câu hỏi',
});
$('.select_loai_tracnghiem').select2({
    placeholder:'Chọn loại câu hỏi',
});
//Hiện popup danh sách câu hỏi
$('.btn_them_tracnghiem').click(function(){
	$('.popup_them_tracnghiem').show();
})
$('.btn_them_tuluan').click(function(){
	$('.popup_them_tuluan').show();
})
$('.themmoi_loai').click(function() {
    var k=Number($(this).attr('data-num')) ;
    var camco=Number($(this).attr('data-camco'));
    if (camco==1) {
       $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm đến trước đó');
        return;
    }
    $(this).parents('.body.width_100').find('.container_form_4_tong').append('<div class="container_form_4  d_flex "><div class="form_group "><label for="">Từ <span class="color_red">*</span></label><input data-diemtu="'+(k)+'" onmouseout="diemnhieuhon(this)" type="text" class="arr_tt_sp tu" name="tu_diem" placeholder="Nhập số điểm"></div><div class="form_group "><label for="">Đến<span class="color_red">*</span></label><input type="text" class="arr_tt_sp den mc_den'+(k+1)+'" name="den_diem" placeholder="Nhập số điểm"></div><div class="form_group "><label for="">Loại<span class="color_red">*</span></label><div class="select_no_muti "><select class="js_select_2 arr_tt_sp" name="loai_danhgia"><option value="">chọn loại</option><option value="1">Yếu</option><option value="2">Trung bình</option><option value="3">Khá</option><option value="4">Giỏi</option><option value="5">Xuất sắc</option></select></div></div><div class="form_group form_btn d_flex content_c"><button type="button" class="btn btn_xoa_loai btn_trang">Xóa</button></div></div>');
     $('.js_select_2').select2({
            width: '100%'
     });
    
     $('.btn_xoa_loai').click(function(){
        $(this).parents('.container_form_4').remove();
     });
     
     $(this).attr('data-num',k+1);
})

function diemnhieuhon(th){
    var i=$(th).attr('data-diemtu');
    var diem=$(th).val();
    var diem_den_truoc=$(th).parents('.container_form_4_tong').find('.mc_den'+i+'').val();
    console.log(diem);
    console.log(diem_den_truoc);
  

   if (Number(diem) <= Number(diem_den_truoc)) {
    console.log('nhohon');
     $('.btn_tieptuc_1').attr('data-camco',1);
     $('.themmoi_loai').attr('data-camco',1);
   }
   else{
    console.log('lonhon dc ');
     $('.btn_tieptuc_1').attr('data-camco',0);
     $('.themmoi_loai').attr('data-camco',0);
   }

}
function CKupdate(){
for ( instance in CKEDITOR.instances )
CKEDITOR.instances[instance].updateElement();
};

function del_row_tracnghiem(th){
	$('.js_check_tracnghiem_tong').prop('checked',false);
	$(th).parents('.row_table').remove();
	var id=$(th).attr('data-id-ch');
	$('.id_tracnghiem_'+id+'').prop('checked',false);
	var diem=Number($(th).parents('.row_table').find('.tongcon').text());
	var tong_diem=Number($('.dang_tracnghiem .show_tong_tracnghiem').text());
	$('.dang_tracnghiem .show_tong_tracnghiem').text(tong_diem-diem);

}

function del_row_tuluan(th){
	$('.js_check_tuluan_tong').prop('checked',false);
	$(th).parents('.row_table').remove();
	var id=$(th).attr('data-id-ch');
	$('.id_tuluan_'+id+'').prop('checked',false);
	var diem=Number($(th).parents('.row_table').find('.tongcontl').text());
	var tong_diem=Number($('.dang_tuluan .show_tong_tracnghiem').text());
	$('.dang_tuluan .show_tong_tracnghiem').text(tong_diem-diem);

}
$('.btn_tieptuc_1').click(function(){
   	 var tdht =$('.thangdiem_ht').val();
     var pl_macdinh = JSON.stringify(<?=$phanloai_hethong?>);
     var type_taode=$('.loai_de').val();
     var type_dekiemtra=$('.hinhthuc_de').val();
     var ten=$('.ten').val();
     var ghi_chu= CKEDITOR.instances['editor1'].getData() ;
     var checkedradio = $('[name=drone]:radio:checked').val();
     var tongdiem=0;
     var tongdiem1=0;
     var tongdiem2=0;
    var str_id="";

    if (type_dekiemtra==1) {
		$('.popup_them_tracnghiem .js_check_tracnghiem_con').each(function(){
			if ($(this).is(":checked")) {
				str_id+=$(this).val()+","; 
			}
		});
	}
	if (type_dekiemtra==2) {
		$('.popup_them_tuluan .js_check_tuluan_con').each(function(){
			if ($(this).is(":checked")) {
				str_id+=$(this).val()+","; 
			}
		});
	}
	if (type_dekiemtra==3) {
		$('.js_checked').each(function(){
			if ($(this).is(":checked")) {
				str_id+=$(this).val()+","; 
			}
		});
	}

	if (type_dekiemtra==1)  tongdiem=Number($('.dang_tracnghiem .show_tong_tracnghiem').text());
	if (type_dekiemtra==2)  tongdiem=Number($('.dang_tuluan .show_tong_tracnghiem').text());
	if (type_dekiemtra==3)  tongdiem=Number($('.dang_tuluan .show_tong_tracnghiem').text())+Number($('.dang_tracnghiem .show_tong_tracnghiem').text());
	
	
    var arr_tt_sp = new Array();
    var i = 1;
    var input = new Array();

    var coco=1;
    $('.arr_tt_sp').each(function(){//Phân loại
        var spp=$(this).val();
        if ($.isNumeric(spp)==false) {
            coco=3;
        }
        
        if( i%3 == 1){
            input = [];
        }
        input.push($(this).val());
        if ( i%3 == 0) {
            arr_tt_sp.push(input);
        }
        i++;
    }); 
    var cococo=1;
    $('.arr_tt_sp').each(function(){
        if (Number($(this).val()) > tdht) {
            cococo=2;
        }
        
    });
    var error=0;
    $('.den').each(function(){
        var gtr_den=$(this).val();
        var gtr_tu=$(this).parents('.container_form_4').find('.tu').val();
        if (Number(gtr_tu)>Number(gtr_den)) {
            error=1;
        }
    });
    if(coco==3 && checkedradio==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Vui lòng chọn số điểm (là số) và phân loại');
        return;
    }
    if(cococo==2 && checkedradio==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Vui lòng chọn số điểm nhỏ hơn '+tdht+'');
        return;
    }
    var phan_loai = JSON.stringify(arr_tt_sp);
    
    if(phan_loai ==="[]" && checkedradio==2){
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Chọn ít nhất 1 phân loại đánh giá');
        return;
    }
    if (error==1) {
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm sau phải lớn hơn số điểm trước');
        return;
    }
    var camco=Number($(this).attr('data-camco'));
    if (camco==1 && checkedradio==2) {
        $('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Số điểm bắt đầu tiếp theo phải lớn hơn số điểm đến trước đó');
        return;
    }
    if(ten==""){
    	$('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Nhập tên đề kiểm tra');
        return;
    }
    if(str_id==""){
    	$('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Chưa chọn câu hỏi');
        return;
    }
    
    if(tongdiem!=tdht){
    	$('.popup_thatbai_thongbao').show();
        $('.popup_thatbai_thongbao_text').text('Tổng điểm câu hỏi phải bằng '+tdht+'');
        return;
    }
    var id_de=<?=$info['id']?>;
    var data_send = new FormData();

        data_send.append('id_de', id_de);
        data_send.append('ten', ten);
        data_send.append('type_taode', type_taode);
        data_send.append('type_dekiemtra', type_dekiemtra);
        data_send.append('tdht', tdht);
        data_send.append('str_id', str_id);
        data_send.append('phan_loai', phan_loai);
        data_send.append('pl_macdinh', pl_macdinh);
        data_send.append('checkedradio', checkedradio);
        data_send.append('ghi_chu', ghi_chu);

        $.ajax({
	      type: "POST",
	      url: "/ajax/edit_de_kiemtra.php",
	      data: data_send,
	      dataType: "json",
	      cache: false,
	      contentType: false,
	      processData: false,
	      enctype: 'multipart/form-data',
	      success: function(response) {
	          if (response.status == true) {
	              $('.popup_thanhcong').show();
	          }
	      }
	  	});
})
</script> 