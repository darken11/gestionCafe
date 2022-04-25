<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  $libelle=$_POST['libelle'];
  $carre=$_POST['carre'];
  $numbero_table=$_POST['numbero_table'];
  $obj_managecafe->insert_ajouter_table($libelle,$carre,$numbero_table);
  header("location:gest_table_list.php");
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Table</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="post" action="">
                     
                     <div class="form-group">
                        <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" 
                          name="libelle" id="libelle" required
                          value="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="carre" class="col-sm-2 control-label">Le Carre</label>
                        <div class="col-sm-4">
                          <select class="form-control required" name="carre">
                            <?php 
                              $get_le_carre=$obj_managecafe->get_gest_le_carre();
                              while($carr1=mysql_fetch_array($get_le_carre))
                              {
                            ?>
                             <option value="<?php echo $carr1['id'];?>"><?php echo $carr1['carre_type_name'];?></option>
                            <?php 
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label for="numbero_table" class="col-sm-2 control-label">Numbero Table</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" required name="numbero_table"
                           id="numbero_table" value="">
                        </div>
                      </div>
                       

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit" class="btn btn-default">Ajouter</button>
                        </div>
                      </div>
                    </form>
                    
                </div>
              </div>
  </div>
<?php 
include('../templatepage/footer.php');
?>