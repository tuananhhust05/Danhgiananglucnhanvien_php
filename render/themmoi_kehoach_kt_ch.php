<? 
include 'config.php';

$id_kt=getValue('id_kt','int','POST',0);

 $query= new db_query("SELECT * FROM de_kiemtra_cauhoi where id = '".$id_kt."'");
 $row = mysql_fetch_assoc($query->result);
 $cauhoi= explode(',',$row['danhsach_cauhoi']);
?>
<?php $stt=0; foreach ($cauhoi as  $value):$stt++; 
    $query= new db_query("SELECT * FROM danhsachcauhoi where id = '".$value."'");
    $info = mysql_fetch_assoc($query->result);
    $dapan=json_decode($info['dap_an'], true);
    $img_cauhoi=json_decode($info['img_cauhoi'], true);
?>

<div class="cauhoi_chitiet cauhoi_chitiet_1 mb_20">
    <?$info['cauhoi'] = str_replace('<br />', '', $info['cauhoi'] );?>
    <p class="mb_20"><span class="font_s15 font_w5 mr_10">Câu hỏi <?=$stt?> : <?=$info['cauhoi']?></span> <span class="font_s14 color_blue">(<?=$info['sodiem']?> điểm)</span></p>

    <?php if (count($img_cauhoi)>0): ?>
        <div class="div_preview_image top-15">
        <?php foreach ($img_cauhoi as  $img): ?>
            <div class='m_boder_img_cauhoi flex bot-15'>
                <div class='wh_img_prvct flex'>
                    <img class='img_cauhoi' style='width: 100%;' src='../ajax/uploads/<?=$img?>'>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    <?php endif ?>

    <p class="font-500 chuden mb_20">Đáp án</p>
    
    <?php if ($info['hinhthuc']==1): ?>
            <!-- <p><?=$info['dap_an']?></p> -->
    <?php endif ?>

    <?php if ($info['hinhthuc']==2): ?>
            <?php foreach ($dapan as  $value): ?>
                <div class="d_flex align_c mb_20">
                    <input style="pointer-events: none;"  type="radio" name="tracnghiem<?=$stt?>" value="" class="mr_5">
                    <label for="huey"><?=$value['answer'][0]?></label>
                </div>
            <?php endforeach ?>
    <?php endif ?>

    <?php if ($info['hinhthuc']==3): ?>
            <?php foreach ($dapan as  $value): ?>
                <div class="d_flex align_c mb_20">
                    <input readonly  type="checkbox" name="hopkiem[]" value="" class="mr_5">
                    <label for="huey"><?=$value['answer'][0]?></label>
                </div>
            <?php endforeach ?>
    <?php endif ?>
</div>
<?php endforeach ?>