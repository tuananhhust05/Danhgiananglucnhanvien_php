<?php
    include("config.php");

    $id_nv = getValue('id_nv','int','POST',0);
    $com_id = getValue('com_id','int','POST',0);
    $pq_tieuchi = trim(getValue('pq_tieuchi','str','POST',''), ",");
    $pq_kiemtra = trim(getValue('pq_kiemtra','str','POST',''), ",");
    $pq_kehoach = trim(getValue('pq_kehoach','str','POST',''), ",");
    $pq_ketqua = trim(getValue('pq_ketqua','str','POST',''), ",");
    $pq_lotrinh = trim(getValue('pq_lotrinh','str','POST',''), ",");
    $pq_phieu = trim(getValue('pq_phieu','str','POST',''), ",");
    $pq_quyen = trim(getValue('pq_quyen','str','POST',''), ",");
    $pq_thangdiem = trim(getValue('pq_thangdiem','str','POST',''), ",");
    
    $q_pq = new db_query("SELECT * FROM tbl_phanquyen WHERE id_cty = '".$usc_id."' AND id_user = '".$id_nv."'");
    $dem_pq = mysql_num_rows($q_pq->result);
    if($dem_pq == 0){
        $insert_pq = new db_query("INSERT INTO tbl_phanquyen (id_user,id_cty,tieuchi_dg,de_kiemtra,kehoach_dg,ketqua_dg,lotrinh_thangtien,phieu_dg,phanquyen,thangdiem) 
        VALUES ($id_nv,$com_id,'$pq_tieuchi','$pq_kiemtra','$pq_kehoach','$pq_ketqua','$pq_lotrinh','$pq_phieu','$pq_quyen','$pq_thangdiem')");
    }else{
    $edit_pq = new db_query("UPDATE tbl_phanquyen SET tieuchi_dg = '".$pq_tieuchi."',de_kiemtra = '".$pq_kiemtra."', kehoach_dg = '".$pq_kehoach."', ketqua_dg = '".$pq_ketqua."', lotrinh_thangtien = '".$pq_lotrinh."', phieu_dg = '".$pq_phieu."', phanquyen = '".$pq_quyen."',thangdiem = '".$pq_thangdiem."' WHERE id_cty = '".$usc_id."' AND id_user = '".$id_nv."'");
    }
    
?>