<?php 
obj_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  $libelle=$_POST['libelle'];
  $description=$_POST['description'];
  $pu=$_POST['pu'];
  
  $obj_managecafe->add_gest_demenu($libelle,$description,$pu);  
  header('location:gest_menu.php');
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
                        <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-4">
                          <select class="form-control required" name="libelle">
                            <?php 
                                $result_get_type=$obj_managecafe->get_libelle_type();

                                while($row1=mysql_fetch_array($result_get_type))
                                {
                            ?>
                            <option value="<?php echo $row1['id'];?>"><?php echo $row1['libelle_name'];?></option>
                            <?php 
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" 
                          name="description" id="description" 
                          value="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">PU</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" name="pu"
                           id="pu" value="">
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