<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
	$plat=$_POST['plat'];
  $quantite=$_POST['quantite'];
  $getid=$_REQUEST['getid'];
  $aj_comid=$_REQUEST['aj_comid'];
  $obj_managecafe->update_ajouter_comm($plat,$quantite,$getid,$aj_comid);
   
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier Ligne de Commande</h1>
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
                        <?php 
                            if($_REQUEST['getid'] AND $_REQUEST['aj_comid'])
                            {
                              $get_res_mod_comm=$obj_managecafe->sing_ajouter_comm($_REQUEST['getid'],$_REQUEST['aj_comid']);

                              while($get_rowid=mysql_fetch_array($get_res_mod_comm))
                              {
                        ?>
                    
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
                                  <?php if($get_rowid['libelle_type_id']==$lib_row['id'])
                                  {
                                    echo "selected";
                                  }?>>
    	                           		<?php echo $lib_row['description'];?>
    	                           	</option>
                                
                              <?php 
                              	}
                              ?>
                          </select>
                        </div>
                      </div>
                   
                     <div class="form-group">
                        <label for="quantite" class="col-sm-2 control-label">Quantity</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control required" required
                          name="quantite" id="quantite" 
                          value="<?php echo $get_rowid['quantity'];?>">
                        </div>
                      </div>
                       

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" id="save_it" name="submit" 
                          class="btn btn-default">Modifier</button>
                        </div>
                      </div>
                    </form>
                    <?php 
                          }
                        }
                    ?>
                    
                </div>
                            <!-- /.table-responsive--> 
                        </div> 
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
             
         
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>


<?php 
include('../templatepage/footer.php');
?>
