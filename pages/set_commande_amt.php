<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
	$setserveur=$_REQUEST['setserveur'];
	$table_no=$_REQUEST['table_no'];
	$total_amt=$_REQUEST['total_amt'];
	$setuniqueid=$_REQUEST['setuniqueid'];
	if($total_amt!=0)
	{
		$obj_managecafe->save_gest_list_commande($setserveur,$table_no,$total_amt,$setuniqueid);
		header('location:gest_commande_list.php');
	}
	else
	{
		header('location:gest_commande_list.php');
	}
}
?>