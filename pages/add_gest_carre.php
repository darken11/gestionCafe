<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  
   $le_carre=$_POST['le_carre'];
   $pu=$_POST['pu']; 
  
   $obj_managecafe->insert_singcarre($le_carre,$pu);
   header('location:gest_carre.php');
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
                        <label for="le_carre" class="col-sm-2 control-label">Le Carre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required"  required
                          name="le_carre" id="le_carre" 
                          value="">
                        </div>
                      </div>

                      
                       <div class="form-group">
                        <label for="pu" class="col-sm-2 control-label">PU</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" required name="pu"
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