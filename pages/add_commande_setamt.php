<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
	 $plat=$_POST['plat'];
   $quantite=$_POST['quantite'];

   if(isset($_REQUEST['setuniqueid']))
	 {
	  	$idunique_get=$_REQUEST['setuniqueid'];
	 }

	 if(isset($_REQUEST['setserveur']))
	 {
	 	$serveur_id=$_REQUEST['setserveur'];	
	 }

	 if(isset($_REQUEST['table_num']))
	 {
	  $table_num_id=$_REQUEST['table_num'];	
	 }
	
	  $obj_managecafe->insert_ajouter_commande($plat,$quantite,$idunique_get,$serveur_id
	  	,$table_num_id);
   
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Commande</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                            

                    <div class="panel panel-default">
                     <!--    <div class="panel-heading">
                            
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                             <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="post" action="">
                     
                      <div class="form-group">
                        <label for="serveur" class="col-sm-2 control-label">plat</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="plat">
    						<?php 
    							$getlib=$obj_managecafe->get_libelle_price();
    							while($lib_row=mysql_fetch_array($getlib))
    							{
    						?>                     
	                           <option value="<?php echo $lib_row['id'].",". $lib_row['PU'];?>" 
                              >
	                           		<?php echo $lib_row['description'];?>
	                           	</option>
                              
                            <?php 
                            	}
                            ?>
                          </select>
                        </div>
                      </div>
                   
                     <div class="form-group">
                        <label for="quantite" class="col-sm-2 control-label">Quantite</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control required" required
                          name="quantite" id="quantite" 
                          value="">
                        </div>
                      </div>
                       

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" id="save_it" name="submit" class="btn btn-default">Suivant</button>
                        </div>
                      </div>
                    </form>
                    
                </div>
                            <!-- /.table-responsive--> 
                        </div> 
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                     <!--    <div class="panel-heading">
                            
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Article</th>
                                            <th>Quantity</th>
                                            <th>Table</th>
                                            <th>Carre</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                     	if(isset($_REQUEST['setuniqueid']))
                                     	{

                                     		$get_result_com=$obj_managecafe->list_ajouter_commande($_REQUEST['setuniqueid']);	
                                     		
                                     	while($get_rowcom=mysql_fetch_array($get_result_com))
                                     	{
                                     ?>
                                        <tr>
                                            <td><?php echo $get_rowcom['description'];?></td>
                                            <td><?php echo $get_rowcom['quantity'];?></td>
                                            <td><?php echo $get_rowcom['libelle'];?></td>
                                            <td><?php echo $get_rowcom['carre_type_name'];?></td>
    	                                    <td>
    	                                    	<?php
    	                                    		echo $get_rowcom['total_price'];
    	                                    	?>
    	                                    </td>
                                        </tr>
                                     <?php 
                                     	}
                                     }
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

<form method="post" action="set_commande_amt.php">
      <input type="hidden" name="curr_date" value="<?php echo date('Y/d/m');?>">
      <input type="hidden" name="setserveur" value="<?php echo $_REQUEST['setserveur'];?>">
      <input type="hidden" name="table_no" value="<?php echo $_REQUEST['table_num'];?>">
      <?php 
        $get_amt=$obj_managecafe->get_total_amt($_REQUEST['setuniqueid']);
        while($get_totl=mysql_fetch_array($get_amt))
        {
      ?>
      <input type="hidden" name="total_amt" value="<?php echo $get_totl['totalamt'];?>">
      <?php 
        }
      ?>
      <input type="hidden" name="setuniqueid" value="<?php echo $_REQUEST['setuniqueid'];?>">

      <button type="submit" name="submit" class="btn btn-default">Terminer</button>

</form>                
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>


<?php 
include('../templatepage/footer.php');
?>
