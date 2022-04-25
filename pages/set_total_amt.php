<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
	$setunid=$_REQUEST['setunid'];
	$total_amt=$_REQUEST['set_totalamount'];
	
	$obj_managecafe->update_gest_list_commande($setunid,$total_amt);
	header('location:gest_commande_list.php');


}
?>