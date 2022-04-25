<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");

$obj_managecafe=new Managecafe();
if(isset($_REQUEST['submit']))
{
   $raison_soc=$_REQUEST['raison'];
   $addresse=$_REQUEST['addresse'];
   $ville=$_REQUEST['ville'];
   $telephone=$_REQUEST['telephone'];
   $fax=$_REQUEST['fax'];
   $obj_managecafe->update_informationcafe($_GET['getid'],$raison_soc,$addresse,
    $ville,$telephone,$fax);
   header("Location:information_cafe.php");

}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifier Information Cafe</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                        if(isset($_GET['getid']))
                        {
                          $getid=$_GET['getid'];
                          $get_result_data=$obj_managecafe->get_single_informationcafe($getid);
                          while($row1=mysql_fetch_array($get_result_data))
                          {
                    ?>

                    <form class="form-horizontal" method="post" action="">
                     
                      <div class="form-group">
                        <label for="raison" class="col-sm-2 control-label">Raison Social</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" required name="raison" value="<?php echo $row1['raison_soc'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="addresse" class="col-sm-2 control-label">Addresse</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" name="addresse" required id="addresse" value="<?php echo $row1['addresse'];?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="ville" class="col-sm-2 control-label">Ville</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" required name="ville" id="ville" value="<?php echo $row1['ville'];?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="telephone" class="col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" id="telephone" required
                          name="telephone" value="<?php echo $row1['telephone'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="fax" class="col-sm-2 control-label">Fax</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" id="fax" required
                          name="fax" value="<?php echo $row1['fax'];?>">
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