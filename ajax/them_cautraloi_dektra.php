<?
	include 'config.php';
	$id_nv=getValue('id_nv','int','POST',0);
	$phieu=getValue('phieu','int','POST',0);
	$update=getValue('update','int','POST',0);
	$mang_trl=getValue('mang_trl','str','POST',"");

	$q_pq = new db_query("SELECT * FROM tbl_cautraloi WHERE id_congty = '".$usc_id."' AND ma_nv = '".$id_nv."' and phieu_id ='".$phieu."' ");
    $dem_pq = mysql_num_rows($q_pq->result);
    if ($dem_pq==0) {
    	$insert_pq = new db_query("INSERT INTO tbl_cautraloi (ma_nv,cau_traloi,trangthai_lam,id_congty,phieu_id) 
        VALUES ($id_nv,'$mang_trl',0,$usc_id,$phieu)");
    }
    else{
    $edit_pq = new db_query("UPDATE tbl_cautraloi SET cau_traloi = '".$mang_trl."' WHERE ma_nv = '".$id_nv."' and phieu_id ='".$phieu."' ");
    }

    $edit = new db_query("UPDATE tbl_cautraloi SET trangthai_lam= '".$update."' WHERE ma_nv = '".$id_nv."' and phieu_id ='".$phieu."' ");
   
?>