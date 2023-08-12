    <?
 include 'config.php';
 $query= new db_query("SELECT * FROM danhsachcauhoi where trangthai_xoa=1 and (hinhthuc=2 or hinhthuc=3) and id_congty=".$usc_id."");
$tracnghiem = $query->result_array();
$list=getValue('list','str','POST','');
$list=explode(',',$list);
?>


<?php $stt=0; foreach ($tracnghiem as $value):$stt++; ?>
<tr class="row_loai_pop_<?=$value['loai']?> row_loai_chung">
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
		<input data-diem='<?=$value['sodiem']?>' data-time='<?=$value['thoigian_thuchien']?>' <?if(in_array($value['id'], $list)) echo 'checked'; ?> type="checkbox" class="js_checked check_hethong_sinhra_tn" value="<?=$value['id'];?>">
	</td>
</tr>
<?php endforeach ?>
	