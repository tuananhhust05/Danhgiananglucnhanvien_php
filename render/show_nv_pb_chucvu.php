<?
include 'config.php';
 $dep_id=getValue('dep_id','int','POST',0); 
 $dep_id_chuvu=getValue('dep_id_chuvu','int','POST',0); 
?>
<?php  $stt=0; foreach ($data_list_nv as $key => $val): ?>
    <?php  if ($val['dep_id']==$dep_id): ?>
        <?php if ($val['position_id']==$dep_id_chuvu):$stt++; ?>
        <div class="flex m_hang">
            <div class="khoi_stt  flex center-center">
                <p class="size-14"><?=$stt;?></p>
            </div>
            <div class="flex khoi_nv center-height left-20">
                <?if($val['ep_image']!=""){
                    ?>
                    <img src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$val['ep_id'])[0]['ep_image'];?>" class="wh26_ra left_am10 left-10" alt="">
                    <?
                }?>
                <?if($val['ep_image']==""){
                    ?>
                    <img src="https://chamcong.timviec365.vn/images/ep_logo.png" class="wh26_ra left_am10 left-10" alt="">
                    <?
                }?> 
                <a class="chuden left-10 size-14"><?=$val['ep_name']?>
                </a>
            </div>
            <div class="khoi_phongban center-height flex left-10" style="width: 300px;">
                <p class="elipsis1 size-14 chuden"><?=$val['dep_name']?></p>
            </div>
            <div class="khoi_chucvu center-center flex left-20">
                <p class="size-14 chuden"><?=$array_cv[$val['position_id']] ?></p>
            </div>
        </div>
        <?php endif ?>
    <?php endif ?>
<?php endforeach ?>
        

            
        