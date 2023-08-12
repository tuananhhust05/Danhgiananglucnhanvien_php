<?
include 'config.php';
$key = getValue("data_id_kh","int","POST",0);

     $query= new db_query("SELECT * FROM kh_danhgia where kh_id = $key");
     $row = mysql_fetch_assoc($query->result);
     $ds_ng_dg=explode(",",$row["kh_user_dg"]);
    
?>
								<?php $stt=0; foreach ($ds_ng_dg as $key => $val): $stt++; ?>
                                <tr>
                                    
                                    <td>
                                        <div class="d_flex align_c">
                                            <?php if (search($data_list_nv,'ep_id',$val)[0]['ep_image']!=""): ?>
                                                <div class="img mr_10 ">
                                                    <img class="wh26_ra" src="https://chamcong.24hpay.vn/upload/employee/<?=search($data_list_nv,'ep_id',$val)[0]['ep_image'];?>" alt="Người tạo">
                                                </div>
                                            <?php endif ?>
                                             <?php if (search($data_list_nv,'ep_id',$val)[0]['ep_image']==""): ?>
                                                 <img class="wh26_ra right-10" src="https://chamcong.timviec365.vn/images/ep_logo.png" alt="Người tạo">
                                             <?php endif ?>
                                            <p class="text_a_l"><?=search($data_list_nv,'ep_id',$val)[0]['ep_name']?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text_a_l"><?=search($data_list_nv,'ep_id',$val)[0]['dep_name']?></p>
                                    </td>
                                    <td>
                                        	<? $cv=search($data_list_nv,'ep_id',$val)[0]['position_id'];?>
      										<p class="text_a_l"><?=$array_cv[$cv]?></p>
                                        
                                    </td>
                                </tr>                          
                                                           
                                <?php endforeach ?>