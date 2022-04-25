<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
 $libelle=$_POST['libelle'];
 $lamajor=$_POST['lamajor'];
 $obj_managecafe->insert_du_carre($libelle,$lamajor);
 header("location:gest_ducarre.php");
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
                    
                    <form class="form-horizontal" method="post" action="">
                     
                     
                      <div class="form-group">
                        <label for="libelle" class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control required" 
                          name="libelle" id="libelle" 
                          value="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="lamajor" class="col-sm-2 control-label">La Majoration</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control required" name="lamajor"
                           id="lamajor" value="">
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