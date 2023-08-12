<?
 include 'config.php';
$a=getValue('str_id','str','POST','');
$a=trim($a,",");
$str_id=explode(",",$a);

$b=getValue('str_id_nv','str','POST','');
$b=trim($b,",");
$str_id_nv=explode(",",$b);


?>
<? $stt=0 ; foreach ($str_id as $key => $value):$stt++;  if(in_array($value, $str_id_nv)==true) continue; ?>
  <tr class="nv_danhgia "  >
  
  <td >
      <p class="<? if(in_array($value, $str_id_nv)==false) echo "chungchung"; ?>"><?=$value;?></p>

  </td>
  <td>
    <div class="d_flex align_c">
      <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']!=""): ?>

        <div class="img mr_10 ">
            <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$value)[0]['ep_image'];?>" alt="Người tạo">
        </div>
         <?php endif ?>

         <?php if (search($data_list_nv,'ep_id',$value)[0]['ep_image']==""): ?>

        <div class="img mr_10 ">
            <img class="wh26_ra" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
        </div>
         <?php endif ?>
        <p><?=search($data_list_nv,'ep_id',$value)[0]['ep_name']?></p>
    </div>
  </td>
  <td>
        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$value)[0]['dep_name']?></p>
  </td>
  <td>
    <? $cv=search($data_list_nv,'ep_id',$value)[0]['position_id'];?>
      <p class="text_a_l"><?=$array_cv[$cv]?></p>
  </td>
  <td>
      <p id-nv='<?=$value?>' onclick="xoanv_danhgia(this)" class="color_red c-pointer">Xóa</p>
  </td>
</tr>
<? endforeach; ?>
