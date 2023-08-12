    <?
 include 'config.php';
$a=getValue('str_id','str','POST','');
$a=trim($a,",");
$str_id=explode(",",$a);

$query= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and (hinhthuc=2 or hinhthuc=3) and id_congty=".$usc_id."");
$tracnghiem = $query->result_array();
?>
<?php $stt=0; foreach ($tracnghiem as $value): ?>
	<?php if (in_array($value['id'],$str_id)):$stt++; ?>
		<tr class="row_table chungchung">
			<td><?=$stt?></td>
			<td  >
				<?$value['cauhoi'] = str_replace('<br />', '', $value['cauhoi'] );?>
				<p style="width: 580px;" class="text_a_l one_line2"><?=$value['cauhoi']?></p>
			</td>
			<td class="tongcon"><?=$value['sodiem']?></td>
			<td>
				<div data-id-ch='<?=$value['id']?>' onclick="del_row_tracnghiem(this)" class="btn_xoa d_flex c-pointer j_center hieuung">
					<div class="img mr_5">
			    		<img src="../img/icon_xoa.png" alt="Xóa">
					</div>
					<p class="color_red font_w5">Xóa</p>
				</div>
			</td>
		</tr>
	<?php endif ?>
<?php endforeach ?>

	
		
<script>
$(document).ready(function(){
    var tong_d_tc= 0;
    $('.tongcon').each(function(){
        tong_d_tc+=Number($(this).text());
    })
    $('.dang_tracnghiem .show_tong_tracnghiem').text(tong_d_tc);
})
</script>