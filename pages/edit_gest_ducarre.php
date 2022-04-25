<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  $gest_du_carre=$_REQUEST['getid'];
  $libelle=$_POST['libelle']; 
  $lamajor=$_POST['lamajor'];
  $obj_managecafe->update_gest_ducarre($gest_du_carre,$libelle,$lamajor);
  header('location:gest_ducarre.php');
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Carre</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                      if(isset($_REQUEST['getid']))
                      {
                       $get_res_ducarre=$obj_managecafe->get_single_ducarre($_REQUEST['getid']);
                       while($row1=mysql_fetch_array($get_res_ducarre))
                       { 
                    ?>
                    <form class="form-horizontal" method="post" action="">
                     
                     
                      <div class="form-group">
                        <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control required" 
                          name="libelle" id="libelle" 
                          value="<?php echo $row1['libelle'];?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="lamajor" class="col-sm-2 control-label">La Majoration</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control required" name="lamajor"
                           id="lamajor" value="<?php echo $row1['la_major'];?>">
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