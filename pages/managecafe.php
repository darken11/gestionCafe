<?php 
$connections=mysql_connect('localhost','root','');

if (!$connections)
{
	die('Cannot Connect to the database');
}

$db_set = mysql_select_db("gestioncafe",$connections);

if(!$db_set)
{
	echo "Database Not Selected";
}

class Managecafe
{
	var $raison_soc;
	var $addresse;
	var $ville;
	var $telephone;
	var $fax;


	public function getinformationcafe()
	{
		$result_query="SELECT * from information_cafe";
		$result = mysql_query($result_query); 
		return $result;
	}

	public function update_informationcafe($get_id,$raison_soc,$addresse,
    $ville,$telephone,$fax)
	{
		$result_query_update="UPDATE information_cafe SET raison_soc='".$raison_soc."',
		addresse='".$addresse."',ville='".$ville."',telephone='".$telephone."',
		fax='".$fax."' WHERE  id=".$get_id;
	
		$result_upd = mysql_query($result_query_update); 
		return $result_upd;
	}

	public function get_single_informationcafe($get_id)
	{
		$result_query_sing="SELECT * FROM information_cafe WHERE id=".$get_id;
		$result_sing=mysql_query($result_query_sing);
		return $result_sing;
	}

	public function get_libelle_type()
	{
		$result_getlib="SELECT * FROM libelle_type";
		$get_res_lib=mysql_query($result_getlib);
		return $get_res_lib;
	}

	 public function add_gest_demenu($libelle,$description,$pu)
	 {
	 	$insert_gest_menu="INSERT INTO gest_de_menu(libelle_type_id,description,PU)
	 	VALUES('".$libelle."','".$description."','".$pu."')";

	 	$ins_result=mysql_query($insert_gest_menu);
	 	return $ins_result;
	 }

	 public function list_gest_menu()
	 {
	 	$get_list_menu="SELECT gest_menu.id,gest_menu.description,gest_menu.PU,
	 					libelle_type.libelle_name
	 	 FROM gest_de_menu as gest_menu
	 	 LEFT JOIN  libelle_type ON gest_menu.libelle_type_id=libelle_type.id ORDER BY gest_menu.id ASC";
	 	 $get_menu=mysql_query($get_list_menu);
	 	 return $get_menu;
	}

	 public function list_gest_menu_search($getid)
	 {
	 	$get_list_menu="SELECT gest_menu.id,gest_menu.description,gest_menu.PU,
	 					libelle_type.libelle_name
	 	 FROM gest_de_menu as gest_menu
	 	 LEFT JOIN  libelle_type ON gest_menu.libelle_type_id=libelle_type.id
	 	 WHERE gest_menu.libelle_type_id=".$getid;
	 	 $get_menu=mysql_query($get_list_menu);
	 	 return $get_menu;
	}

	public function get_sing_gistmenu($getid)
	{
		$get_sing_data="SELECT gest_menu.id,gest_menu.description,gest_menu.PU,
	 					libelle_type.libelle_name,libelle_type.id as libe_type
	 	 FROM gest_de_menu as gest_menu 
	 	 LEFT JOIN  libelle_type ON gest_menu.libelle_type_id=libelle_type.id
	 	 WHERE gest_menu.id=".$getid;
		
		$get_menu_single=mysql_query($get_sing_data);
	 	 return $get_menu_single;
	}

	public function update_gest_menu($getid,$libelle,$description,$pu)
	{
		$result_query_update="UPDATE gest_de_menu SET libelle_type_id='".$libelle."',
		description='".$description."',PU='".$pu."' WHERE  id=".$getid;
	
		$result_upd = mysql_query($result_query_update); 
		return $result_upd;
	}

	public function delete_gest_menu($delgetid)
	{
		$delete_menu="DELETE FROM gest_de_menu WHERE id=".$delgetid;
		$remove_menu=mysql_query($delete_menu);
		return $remove_menu;
	}

	public function insert_du_carre($libelle,$lamajor)
	{
		$insert_gest_carre="INSERT INTO gest_du_carre(libelle,la_major)
	 	VALUES('".$libelle."','".$lamajor."')";

	 	$ins_result_gest=mysql_query($insert_gest_carre);
	 	return $ins_result_gest;
	}

	public function list_du_carre()
	{
		$get_list_carre="SELECT * FROM  gest_du_carre ORDER BY id ASC";
	 	$get_carre=mysql_query($get_list_carre);
	 	return $get_carre;
	}

	public function get_single_ducarre($get_id)
	{
		$get_ducarre="SELECT * FROM gest_du_carre WHERE id=".$get_id;
		$result_duccare=mysql_query($get_ducarre);
		return $result_duccare;
	}

	public function update_gest_ducarre($getid,$libelle,$description,$pu)
	{
		$result_query_update="UPDATE gest_du_carre SET libelle='".$libelle."',
		la_major='".$description."' WHERE  id=".$getid;
	
		$result_upd = mysql_query($result_query_update); 
		return $result_upd;
	}

	public function delete_du_carre($delgetid)
	{
		$delete_menu="DELETE FROM gest_du_carre WHERE id=".$delgetid;
		$remove_menu=mysql_query($delete_menu);
		return $remove_menu;
	}

	public function get_gest_le_carre()
	{
		$get_list_tab="SELECT * FROM le_carre_type";
		$get_res_tab=mysql_query($get_list_tab);
		return $get_res_tab;
	}

	public function insert_ajouter_table($libelle,$carre,$numbero_table)
	{
		$insert_ajouter="INSERT INTO ajouter_table(le_carre_type_id,libelle,numbero_table)
	 	VALUES('".$carre."','".$libelle."','".$numbero_table."')";

	 	$ins_result_ajouter=mysql_query($insert_ajouter);
	 	return $ins_result_ajouter;
	}

	public function ajouter_table_list()
	{
		$get_list_table="SELECT aj_tb.id as ajtb_id,aj_tb.libelle,aj_tb.numbero_table,le_carre.carre_type_name
		FROM ajouter_table as aj_tb
		LEFT JOIN le_carre_type  as le_carre ON le_carre. id=aj_tb.le_carre_type_id ORDER BY aj_tb.id ASC";
		$get_res_data=mysql_query($get_list_table);

		return $get_res_data;
	}

	public function ajouter_table_list_search($getid)
	{
		$get_list_table="SELECT aj_tb.id as ajtb_id,aj_tb.libelle,aj_tb.numbero_table,le_carre.carre_type_name
		FROM ajouter_table as aj_tb
		LEFT JOIN le_carre_type  as le_carre ON le_carre. id=aj_tb.le_carre_type_id 
		WHERE aj_tb.le_carre_type_id".$getid;
		$get_res_data=mysql_query($get_list_table);

		return $get_res_data;
	}

	public function get_sing_ajouter_table($ajtbid)
	{
		$get_sing_data="SELECT aj_tb.id as ajtb_id,aj_tb.libelle,aj_tb.numbero_table,le_carre.carre_type_name,
		aj_tb.le_carre_type_id
		FROM ajouter_table as aj_tb
		LEFT JOIN le_carre_type  as le_carre ON le_carre. id=aj_tb.le_carre_type_id WHERE aj_tb.id=".$ajtbid;
		$get_data_single=mysql_query($get_sing_data);

		return $get_data_single;
	}

	public function update_sing_ajouter_table($get_theid,$libelle,$carre,$numbero_table)
	{
		$result_query_update="UPDATE ajouter_table SET le_carre_type_id='".$carre."',
		libelle='".$libelle."',numbero_table='".$numbero_table."' WHERE  id=".$get_theid;
	
		$result_upd = mysql_query($result_query_update); 
		return $result_upd;
	}

	public function delete_ajouter_table($delgetid)
	{
		$delete_rec="DELETE FROM ajouter_table WHERE id=".$delgetid;
		$remove_rec=mysql_query($delete_rec);
		return $remove_rec;
	}

	public function insert_ajouter_serveurs($nom,$prenom,$time_work,$adresse,$login)
	{
		$insert_ajouter_servers="INSERT INTO ajouter_serveurs(nom,prenom,time_work,addresse,login)
	 	VALUES('".$nom."','".$prenom."','".$time_work."','".$adresse."','".$login."')";

	 	$ins_servers_ajouter=mysql_query($insert_ajouter_servers);
	 	return $ins_servers_ajouter;
	}

	public function display_ajouter_serveurs()
	{
		$get_result_dt="SELECT * FROM ajouter_serveurs ORDER BY id ASC";
		$get_serveurs=mysql_query($get_result_dt);

		return $get_serveurs;
	}

	public function sing_ajouter_serveurs($gettheid)
	{
		$sing_result_dt="SELECT * FROM ajouter_serveurs WHERE id=".$gettheid;
		$get_serveurs_one=mysql_query($sing_result_dt);

		return $get_serveurs_one;
	}

	public function update_ajouter_serveurs($getid,$nom,$prenom,$time_work,$adresse,$login)
	{
		$result_query_update="UPDATE ajouter_serveurs SET nom='".$nom."',
		prenom='".$prenom."',time_work='".$time_work."',addresse='".$adresse."',
		login='".$login."' WHERE  id=".$getid;
	
		$result_upd = mysql_query($result_query_update); 
		return $result_upd;
	}

	public function delete_ajouter_serveurs($getid)
	{
		$delete_rec_ser="DELETE FROM ajouter_serveurs WHERE id=".$getid;
		$delete_ser=mysql_query($delete_rec_ser);
	}

	public function get_libelle_price()
	{
		$get_libelle="SELECT libelle_type.id,libelle_type.libelle_name ,gest_mn.PU,
		gest_mn.description
		FROM libelle_type
		RIGHT JOIN gest_de_menu as gest_mn ON gest_mn.libelle_type_id=libelle_type.id
		ORDER BY libelle_type.id ASC";

		$res_libelle=mysql_query($get_libelle);
		return $res_libelle;
	}

	public function get_table_serveur($serveur,$table_no)
	{
		$unique_id=uniqid();
		header('location:add_commande_setamt.php?setserveur='.$serveur.'&table_num='.$table_no.'&setuniqueid='.$unique_id);
	}

	public function insert_ajouter_commande($plat,$quantite,$idunique_get,$serveur_id
		,$table_num_id)
	{	

		$setplat=explode(',',$plat);
		$plat=$setplat[0];
		$amt=$setplat[1];
		$totalprice=$quantite*$amt;
		
		$insert_gest_commande="INSERT INTO ajouter_commande(libelle_type_id,quantity,idunique_get,serveur_id,
			table_num_id,total_price)
	 	VALUES('".$plat."','".$quantite."','".$idunique_get."','".$serveur_id."','".$table_num_id."','".$totalprice."')";


	 	$ins_result_commande=mysql_query($insert_gest_commande);
	 	return $insert_gest_commande;
	 	 if(isset($ins_result_commande))
	 	 {
	 	 	header('location:add_commande_setamt.php?setserveur='.$serveur_id.'&table_num='.$table_num_id.'&setuniqueid='.$idunique_get);
	 	 }

	}

	public function list_ajouter_commande($setuniqueid)
	{	
		$setunid=$setuniqueid;
		$get_commande_res="SELECT lib_type.libelle_name,quantity,aj_tb.libelle,
		le_carety.carre_type_name,de_menu.PU,total_price,de_menu.description
		FROM  ajouter_commande
		LEFT JOIN libelle_type  lib_type ON ajouter_commande.libelle_type_id=lib_type.id
		LEFT JOIN ajouter_table  aj_tb ON aj_tb.id= ajouter_commande.table_num_id
		LEFT JOIN le_carre_type le_carety ON le_carety.id=aj_tb.le_carre_type_id
		LEFT JOIN gest_de_menu de_menu ON ajouter_commande.libelle_type_id=de_menu.libelle_type_id
		WHERE ajouter_commande.idunique_get LIKE '$setunid' ORDER BY de_menu.PU DESC";

		$get_theres=mysql_query($get_commande_res);
		
		return $get_theres;
	}

	public function get_total_amt($idunique_get)
	{
		$get_amt_price="SELECT sum(total_price) as totalamt FROM ajouter_commande WHERE 
		idunique_get LIKE '$idunique_get'";

		$pricess=mysql_query($get_amt_price);
		return $pricess;
	}



	public function list_gest_commande()
	{
		$disp_commande="SELECT * FROM  gest_list_commande";
		$get_commande=mysql_query($disp_commande);
		return $get_commande;
	}

	public function save_gest_list_commande($setserveur,$table_no,$total_amt,$setuniqueid)
	{
		$status=0;
		$curr_date=date('Y/m/d');
		$ins_commande="INSERT INTO gest_list_commande(curr_date,serveurs_id,table_no,
			status,total_amount,setidunique) VALUES('".$curr_date."','".$setserveur."',
			'".$table_no."','".$status."','".$total_amt."','".$setuniqueid."')";
		$save_commande=mysql_query($ins_commande);
		return $save_commande;
	}

	public function list_lignes_commande($setuni_id)
	{
		$list_commande="SELECT lib_type.libelle_name,aj_comm.quantity,aj_tb.libelle,
		le_carr.carre_type_name,aj_comm.total_price,aj_comm.id as idajcom,aj_comm.idunique_get,
		ges_du.description
		FROM 
		gest_list_commande
		RIGHT JOIN ajouter_commande AS aj_comm ON aj_comm.idunique_get=gest_list_commande.setidunique
		RIGHT JOIN libelle_type AS lib_type ON lib_type.id=aj_comm.libelle_type_id
		RIGHT JOIN ajouter_table AS aj_tb ON aj_tb.id=gest_list_commande.table_no
		RIGHT JOIN le_carre_type AS le_carr ON le_carr.id=aj_tb.le_carre_type_id
		RIGHT JOIN gest_de_menu AS ges_du ON ges_du.libelle_type_id=lib_type.id
		WHERE gest_list_commande.setidunique LIKE '$setuni_id'
		";

		$get_commande_list=mysql_query($list_commande);
		return $get_commande_list;
	}

	public function sing_ajouter_comm($getid,$aj_comid)
	{
		$get_res_sing="SELECT * FROM ajouter_commande WHERE idunique_get LIKE '$getid'
		AND id=".$aj_comid;
		$return_res_com=mysql_query($get_res_sing);
		return $return_res_com;		
	}

	public function update_ajouter_comm($plat,$quantite,$getid,$aj_comid)
	{
		$setplat=explode(',',$plat);
		$plat=$setplat[0];
		$amt=$setplat[1];
		$totalprice=$quantite*$amt;

		$update_ajcom="UPDATE ajouter_commande SET libelle_type_id='".$plat."',
		quantity='".$quantite."',total_price='".$totalprice."'
		WHERE idunique_get LIKE '$getid' AND id=".$aj_comid;

		$set_ajcom_dt=mysql_query($update_ajcom);

		 if(isset($set_ajcom_dt))
	 	 {
	 	 	header('location:edit_gest_commande.php?getun_id='.$getid);
	 	 }
	}

	public function update_gest_list_commande($setunid,$total_amt)
	{
		$update_gest_comande="UPDATE gest_list_commande SET 
		total_amount='".$total_amt."' WHERE setidunique LIKE '$setunid'";

		$set_gest_commande=mysql_query($update_gest_comande);
	}

	public function get_ajouter_table($getid)
	{
	 
	 $get_list_table="SELECT aj_tb.id as ajtb_id,aj_tb.libelle,aj_tb.numbero_table,le_carre.carre_type_name
	 FROM ajouter_table as aj_tb
	 LEFT JOIN le_carre_type  as le_carre ON le_carre. id=aj_tb.le_carre_type_id 
	 WHERE aj_tb.le_carre_type_id=".$getid;
	
	 $get_res_data=mysql_query($get_list_table);
  	 return $get_res_data;
	}
	
	public function delete_ajouter_commande($getid)
	{
		$delete_aj="DELETE FROM ajouter_commande WHERE id=".$getid;
		$delete_commande=mysql_query($delete_aj);
		return $delete_commande;
	}

	public function delete_des_commande($deleteid,$uniud)
	{
		$delete_comm="DELETE FROM gest_list_commande WHERE id=".$deleteid;
		$dele_comm=mysql_query($delete_comm);
		return $dele_comm;

		 if(isset($dele_comm))
	 	 {
	 	 	header('location:edit_gest_commande.php?getun_id='.$uniud);
	 	 }

	}

	public function set_gestlist_status($getid)
	{
		$update_gest_comande_status="UPDATE gest_list_commande SET 
		status='1' WHERE id=".$getid;

		$set_gest_commande=mysql_query($update_gest_comande_status);	
	}


	public function get_total_amt_all()
	{
		$get_amt_price="SELECT sum(total_price) as totalamt FROM ajouter_commande";

		$pricess=mysql_query($get_amt_price);
		return $pricess;
	}


	public function list_gest_commande_search($setdate3)
	{
		$disp_commande="SELECT * FROM  gest_list_commande WHERE curr_date='$setdate3'";
		$get_commande=mysql_query($disp_commande);
		return $get_commande;
	}

	public function delete_des_controle_dacaisse($getid)
	{
		$delete_controle="DELETE FROM gest_list_commande WHERE id=".$getid;
		$delete_con=mysql_query($delete_controle);
		return $delete_con;
	}

	public function get_printdetails($getserid)
	{
		$get_printdt="SELECT aj_serv.nom,aj_tb.libelle,le_carre.carre_type_name,
		le_carre.carre_amt
		FROM gest_list_commande
		RIGHT JOIN ajouter_serveurs AS aj_serv ON aj_serv.id=gest_list_commande.serveurs_id
		RIGHT JOIN ajouter_table AS aj_tb ON aj_tb.id=gest_list_commande.table_no
		RIGHT JOIN le_carre_type AS le_carre ON le_carre.id=aj_tb.le_carre_type_id
		WHERE  gest_list_commande.setidunique LIKE '$getserid'";
	
		$getres_pt=mysql_query($get_printdt);
		return $getres_pt;
	}

	public function get_carre_list()
	{
		$disp_carre="SELECT * FROM  le_carre_type";
		$get_carre=mysql_query($disp_carre);
		return $get_carre;

	}

	public function delete_carre($getid)
	{
		$delete_controle="DELETE FROM le_carre_type WHERE id=".$getid;
		$delete_con=mysql_query($delete_controle);
		return $delete_con;
	}

	public function sing_carre($getid)
	{
		$disp_carre_sing="SELECT * FROM  le_carre_type WHERE id=".$getid;
		$get_carre_sing=mysql_query($disp_carre_sing);
		return $get_carre_sing;

	}

	public function insert_singcarre($le_carre,$pu)
	{
		$ins_carre="INSERT INTO le_carre_type(carre_type_name,carre_amt) 
		VALUES('".$le_carre."','".$pu."')";
		$save_carre=mysql_query($ins_carre);
		return $save_carre;
	} 
	public function update_singcarre($getid,$le_carre,$pu)
	{
		$upd_carre="UPDATE le_carre_type set carre_type_name='".$le_carre."',
		carre_amt='".$pu."' WHERE id=".$getid;
		$upd_data=mysql_query($upd_carre);
		return $upd_data;
	}

	public function gettotalamt($getuniud)
	{
		$getamt="SELECT gest_list_commande.total_amount,le_carre.carre_amt FROM 
		gest_list_commande
		LEFT JOIN ajouter_table AS ajtb ON ajtb.id=gest_list_commande.table_no
		LEFT JOIN le_carre_type AS le_carre ON le_carre.id=ajtb.le_carre_type_id
		WHERE setidunique LIKE '$getuniud'";
		$get_resamt=mysql_query($getamt);
	
		return $get_resamt;
	}

}
?>	
