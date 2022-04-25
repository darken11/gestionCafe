<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  $get_theid=$_REQUEST['ajtbid'];
  $libelle=$_POST['libelle']; 
  $carre=$_POST['carre'];
  $numbero_table=$_POST['numbero_table'];
  
  $obj_managecafe->update_sing_ajouter_table($get_theid,$libelle,$carre,$numbero_table);
  header('location:gest_table_list.php');
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Table</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php 
              if(isset($_REQUEST['ajtbid']))
              {
                $get_ajouter_data=$obj_managecafe->get_sing_ajouter_table($_REQUEST['ajtbid']);
                while($get_rowdata=mysql_fetch_array($get_ajouter_data))
                {
            ?>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="post" action="">
                     
                     <div class="form-group">
                        <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" required
                          name="libelle" id="libelle" 
                          value="<?php echo $get_rowdata['libelle'];?>">
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
                             <option value="<?php echo $carr1['id'];?>"
                              <?php if($get_rowdata['le_carre_type_id']==$carr1['id']){ echo "selected";} ?>><?php echo $carr1['carre_type_name'];?></option>
                            <?php 
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label for="numbero_table" class="col-sm-2 control-label">Numbero Table</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" name="numbero_table"
                          required
                           id="numbero_table" value="<?php echo $get_rowdata['numbero_table'];?>">
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
            <?php
                } 
              }
            ?>
  </div>
<?php 
include('../templatepage/footer.php');
?>