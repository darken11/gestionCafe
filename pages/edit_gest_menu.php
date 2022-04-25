<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{     
   $getid=$_REQUEST['getid'];
   $libelle=$_POST['libelle'];
   $description=$_POST['description'];
   $pu=$_POST['pu'];

  $obj_managecafe->update_gest_menu($getid,$libelle,$description,$pu);
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
                  <?php 
                    if(isset($_REQUEST['getid']))
                    {
                      $get_result=$obj_managecafe->get_sing_gistmenu($_REQUEST['getid']);
                        
                        while($getthedata_sing=mysql_fetch_array($get_result))
                        {
                  ?>
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
                            <option value="<?php echo $row1['id'];?>"
                              <?php if($getthedata_sing['libe_type']==$row1['id']){ echo "selected";}?>
                              ><?php echo $row1['libelle_name'];?></option>
                              
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
                          value="<?php echo $getthedata_sing['description'];?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">PU</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" name="pu"
                           id="pu" value="<?php echo $getthedata_sing['PU'];?>">
                        </div>
                      </div>
                       

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="submit" class="btn btn-default">Ajouter</button>
                        </div>
                      </div>
                    </form>
                  <?php
                        }
                    }
                   ?>
                </div>
              </div>
  </div>
<?php 
include('../templatepage/footer.php');
?>