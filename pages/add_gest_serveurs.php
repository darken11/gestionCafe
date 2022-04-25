<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $time_work=$_POST['time_work_rad'];
  $adresse=$_POST['adresse'];
  $login=$_POST['login'];
  $obj_managecafe->insert_ajouter_serveurs($nom,$prenom,$time_work,$adresse,$login);
 header("location:gest_serveurs_list.php");
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ajouter Serveurs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    
                    <form class="form-horizontal" method="post" action="">
                     
                     
                      <div class="form-group">
                        <label for="nom" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control required" required
                          name="nom" id="nom" 
                          value="">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="prenom" class="col-sm-2 control-label">Prenom</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control required" required name="prenom"
                           id="Prenom" value="">
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <label for="time_work" class="col-sm-2 control-label">Time Work</label>
                        <div class="col-sm-5">
                          <label class="radio-inline">
                            <input id="time_work_rad" type="radio" 
                            checked="" value="1" name="time_work_rad">11:00 AM to 3:00 PM</label>
                           <label class="radio-inline">
                            <input id="time_work_rad" type="radio" 
                             value="2" name="time_work_rad">3:00 PM to 11:00 PM </label>
                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control required" required name="adresse"
                           id="adresse" value="">
                        </div>
                      </div>

                     <div class="form-group">
                        <label for="login" class="col-sm-2 control-label">Login</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control required" required name="login"
                           id="login" value="">
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