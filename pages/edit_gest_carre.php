<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  if(isset($_REQUEST['getid']))
    {
      $getid=$_REQUEST['getid'];
    }
   $le_carre=$_POST['le_carre'];
   $pu=$_POST['pu']; 
  
   $obj_managecafe->update_singcarre($getid,$le_carre,$pu);
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
            <?php 
              if(isset($_REQUEST['getid']))
              {
                $get_carre_data=$obj_managecafe->sing_carre($_REQUEST['getid']);
                while($get_rowdata=mysql_fetch_array($get_carre_data))
                {
            ?>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="post" action="">
                     
                     <div class="form-group">
                        <label for="le_carre" class="col-sm-2 control-label">Le Carre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" required
                          name="le_carre" id="le_carre" 
                          value="<?php echo $get_rowdata['carre_type_name'];?>">
                        </div>
                      </div>

                      
                       <div class="form-group">
                        <label for="pu" class="col-sm-2 control-label">PU</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control required" name="pu" required
                           id="pu" value="<?php echo $get_rowdata['carre_amt'];?>">
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