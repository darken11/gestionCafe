<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
$gettheinfor=$obj_managecafe->getinformationcafe();
$gettheinfor2=$obj_managecafe->getinformationcafe();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">La Facture</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">

                       <div class="col-lg-12">
                        <?php 
                            while($getinformation=mysql_fetch_array($gettheinfor))
                            {
                        ?>
                          <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;margin-left:20px;">
                            <?php echo $getinformation['raison_soc'];?>
                         </label>

                          <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;margin-left:20px;">
                            <?php echo $getinformation['addresse'];?>
                         </label>
                          <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;margin-left:20px;">
                            <?php echo $getinformation['ville'];?>
                          </label>    
                                                 
                          <div class="set1">
                            <img src="<?php echo BASE_URL;?>images/phone-call-active-512.jpg" style=" width:2%!important;"><label for="libelle" class="col-sm-10 control-label"  style="float:none!important;">
                            <?php echo $getinformation['telephone'];?>
                            </label>
                          </div>
                          <div class="set2">
                            <img src="<?php echo BASE_URL;?>images/printer-scanner-fax_318-29881.png" style=" width:2%!important;">
                          <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;">
                            <?php echo $getinformation['fax'];?>
                          </label>
                        </div>
                        <?php 
                            }
                        ?>
                        </div>
<br><br>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                     <!--    <div class="panel-heading">
                            
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Article</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                    $get_list_comm=$obj_managecafe->list_lignes_commande($_REQUEST['getun_id']);
                                             while($getrow_com=mysql_fetch_array($get_list_comm))
                                                            {
                                            ?>
                                                       <tr>
                                                            <td><?php echo $getrow_com['libelle_name'];?></td>
                                                            <td><?php echo $getrow_com['quantity'];?></td>
                                                            <td><?php echo $getrow_com['total_price'];?></td>
                                                        </tr>
                                                 <?php 
                                                    }
                                                 ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->

                </div>
                <br><br><br>
                <?php 

                $getbdett=$obj_managecafe->get_printdetails($_REQUEST['getun_id']);

                while($getrowdt=mysql_fetch_array($getbdett))
                {
                ?>
                <label for="libelle" class="control-label">Serveur </label> : <?php echo $getrowdt['nom'];?><br><br>
                <label for="libelle" class=" control-label">Table </label> : <?php echo $getrowdt['libelle'];?><br><br>
                <label for="libelle" class=" control-label">Carre </label> : <?php echo $getrowdt['carre_type_name'];?><br><br>
                
                <label for="libelle" class=" control-label">Majoration Du Carre </label> : <?php echo $getrowdt['carre_amt'];?><br><br><br>
                <?php 
                }
                ?>
                <hr size="30" style=" border-width: 4px 0 0!important;">
                <?php 
                  $getres=$obj_managecafe->gettotalamt($_REQUEST['getun_id']);
                  while($getrw=mysql_fetch_array($getres))
                  {
                ?>
                
                <label for="libelle" class=" control-label">Total a payer </label> :
                <?php 
                echo $getrw['total_amount'] + $getrw['carre_amt'];
              }
                ?><br><br><br><br>

</div>
</div>
<div style="text-align:center;">
                  <button type="button" class="btn btn-default" onClick="printDiv();">Imprimer</button>
                            
                  <a href="<?php echo BASE_URL;?>pages/encaisser_commande_list.php">
                      <button type="button" class="btn btn-default">Retour</button>
                </a>  

</div>
</div>
            <!-- /.row -->
           
            <!-- /.row -->


<?php 
include('../templatepage/footer.php');
?>
<script>
function printDiv()
{
  var divtoprint=document.getElementById('divtoprint');
  var popupwin=window.open('','_blank','width=500','height=500');
  popupwin.document.write('<html><body onload="window.print()">'+divtoprint.innerHTML+'</html>');
 popupwin.document.close(); 
}
</script>

<div id="divtoprint" style="display:none;">
      <h1 class="page-header" style="padding-bottom: 9px;
    margin: 40px 0 20px;border-bottom: 1px solid #eee;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;">
      La Facture
    </h1>

      <table>
          <?php 
              while($getinformation=mysql_fetch_array($gettheinfor2))
              {
          ?>

          <tr>
            <td>
              <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;margin-left:20px;">
                <b><?php echo $getinformation['raison_soc'];?></b>
             </label>
            </td>
         </tr>

         <tr>
           <td>
             <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;margin-left:20px;">
              <b><?php echo $getinformation['addresse'];?></b>
              </label>
            </td>
        </tr>

        <tr>
            <td>
              <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;margin-left:20px;">
                <b><?php echo $getinformation['ville'];?></b>
              </label> 
            </td>
        </tr>   
                                   
         <tr>
             <td>
              <img src="<?php echo BASE_URL;?>images/phone-call-active-512.jpg"
               style=" width:2%!important;">
   
                <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;">
                <b><?php echo $getinformation['telephone'];?></b>
                </label>
              </td>
          </tr>

          <tr>
            <td>
              <img src="<?php echo BASE_URL;?>images/printer-scanner-fax_318-29881.png" 
              style=" width:2%!important;">
            
              <label for="libelle" class="col-sm-10 control-label"  style="float:none!important;">
                <b><?php echo $getinformation['fax'];?></b>
              </label>
            </td>
          </tr>
          <?php 
              }
          ?>
     </table>

     <div class="col-lg-12">
                    <div class="panel panel-default">
                     <!--    <div class="panel-heading">
                            
                        </div> -->
                        <!-- /.panel-heading -->
                        <br><br>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table setcolor" border="1" cellpadding="0" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <td style="width:300px;text-align:left;border-left:0;border-right:0px;;"><b>Article</b></th>
                                            <td style="width:300px;text-align:left;border-left:0;border-right:0px;"><b>Quantity</b></th>
                                            <td style="width:300px;text-align:left;border-left:0;border-left:0px;"><b>Total</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                    $get_list_comm2=$obj_managecafe->list_lignes_commande($_REQUEST['getun_id']);
                                             while($getrow_com=mysql_fetch_array($get_list_comm2))
                                                            {
                                            ?>
                                                       <tr>
                                                            <td style="width:300px;border-left:0;border-right:0px;border-bottom:0px;"><?php echo $getrow_com['libelle_name'];?></td>
                                                            <td style="width:300px;border-left:0;border-right:0px;border-bottom:0px;"><?php echo $getrow_com['quantity'];?></td>
                                                            <td style="width:300px;border-left:0;border-bottom:0px; "><?php echo $getrow_com['total_price'];?></td>
                                                        </tr>
                                                 <?php 
                                                    }
                                                 ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->

                    </div>
                    <!-- /.panel -->

                </div>
                       

                        <br><br><br>
                <?php 

                $getbdett2=$obj_managecafe->get_printdetails($_REQUEST['getun_id']);

                while($getrowdt=mysql_fetch_array($getbdett2))
                {
                ?>
                <label for="libelle" class="control-label"><b>Serveur</b> </label> : <?php echo $getrowdt['nom'];?><br><br>
                <label for="libelle" class=" control-label"><b>Table </b></label> : <?php echo $getrowdt['libelle'];?><br><br>
                <label for="libelle" class=" control-label"><b>Carre </b></label> : <?php echo $getrowdt['carre_type_name'];?><br><br>
                
                <label for="libelle" class=" control-label"><b>Majoration Du Carre </b></label> : <?php echo $getrowdt['carre_amt'];?><br><br><br>
                <?php 
                }
                ?>
                <hr size="30" style=" border-width: 2px 0 0!important;">
                <?php 
                  $getres=$obj_managecafe->gettotalamt($_REQUEST['getun_id']);
                  while($getrw=mysql_fetch_array($getres))
                  {
                ?>
                
                <label for="libelle" class=" control-label"><b>Total a payer </b></label> :
                <?php 
                echo $getrw['total_amount'] + $getrw['carre_amt'];
              }
                ?><br><br><br><br>
    </div> 
     </div>
<style>

.setcolor  td {
   border: 1px solid #DDD;
}
</style>