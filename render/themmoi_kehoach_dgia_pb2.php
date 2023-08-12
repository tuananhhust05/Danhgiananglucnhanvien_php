<?
include 'config.php';
 $dep_id=getValue('dep_id','int','POST',0);
 $a=getValue('str_id_nv','str','POST','');
$a=trim($a,",");
$str_id_nv=explode(",",$a);

?>

<table class="bangchinh bang_tieuchi">
    <tbody>
    	<?php if ($dep_id!=0): ?>
    		<?php $stt=0; foreach ($data_list_nv as $key => $value): ?>
    			<?php if ($value['dep_id']==$dep_id): $stt++;?>
    				<tr class="nv_chung_ng_dg nv_id_ng_dg<?=$value['ep_id']?>">
			            <td>
			                <p><?=$stt?></p>
			            </td>
			            <td>
			                <p><?=$value['ep_name']?></p>
			            </td>
			            <td>
			                <p><?=$value['dep_name']?></p>
			            </td>
			            <td>

			                <p><?=$array_cv[$value['position_id']]?></p>
			            </td>
			            <td>
			                <input <?if(in_array($value['ep_id'], $str_id_nv)==true) echo "checked"; ?> type="checkbox" class="checkcon un_check_con2_<?=$value['ep_id'];?>" value="<?=$value['ep_id'];?>">
			            </td>
	        		</tr>
    			<?php endif ?>
    		<?php endforeach ?>
    	<?php endif ?>
    	<?php if ($dep_id==0): ?>
    		<?php $stt=0; foreach ($data_list_nv as $key => $val):$stt++ ?>
    			<tr class="nv_chung_ng_dg nv_id_ng_dg<?=$value['ep_id']?>">
		            <td>
		                <p><?=$stt?></p>
		            </td>
		            <td>
		                <p><?=$val['ep_name']?></p>
		            </td>
		            <td>
		                <p><?=$val['dep_name']?></p>
		            </td>
		            <td>

		                <p><?=$array_cv[$val['position_id']]?></p>
		            </td>
		            <td>
		                <input <?if(in_array($val['ep_id'], $str_id_nv)==true) echo "checked"; ?> type="checkbox" class="checkcon" value="<?=$val['ep_id'];?>">
		            </td>
        		</tr>
    		<?php endforeach ?>
    	<?php endif ?>

    </tbody>
</table>