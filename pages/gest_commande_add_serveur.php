<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
 $serveur=$_POST['serveur'];
 $table_no=$_POST['table_no'];
 $obj_managecafe->get_table_serveur($serveur,$table_no);
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Element de Menu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="post" action="">
                     
                      <div class="form-group">
                        <label for="serveur" class="col-sm-2 control-label">Serveur</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="serveur">
                            <?php 
                                $result_get_serv=$obj_managecafe->display_ajouter_serveurs();

                                while($row_serv=mysql_fetch_array($result_get_serv))
                                {
                            ?>
                            <option value="<?php echo $row_serv['id'];?>"><?php echo $row_serv['nom'];?></option>
                            <?php 
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                   
                      <div class="form-group">
                        <label for="table_no" class="col-sm-2 control-label">Table</label>
                        <div class="col-sm-4">
                          <select class="form-control" name="table_no">
                            <?php 
                                $result_get_tables=$obj_managecafe->ajouter_table_list();

                                while($row_table1=mysql_fetch_array($result_get_tables))
                                {
                            ?>
                            <option value="<?php echo $row_table1['ajtb_id'];?>"><?php echo $row_table1['libelle'];?></option>
                            <?php 
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                       

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit" class="btn btn-default">Suivant</button>
                        </div>
                      </div>
                    </form>
                    
                </div>
              </div>
  </div>
<?php 
include('../templatepage/footer.php');
?>