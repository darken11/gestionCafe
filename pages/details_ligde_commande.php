<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Details Lignes de commande</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

               
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
                                            <th>Table</th>
                                            <th>Carre</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if($_REQUEST['getun_id'])
                                        {
                                            $get_list_comm=$obj_managecafe->list_lignes_commande($_REQUEST['getun_id']);
                                            while($getrow_com=mysql_fetch_array($get_list_comm))
                                            {
                                    ?>
                                        <tr>
                                            <td><?php echo $getrow_com['libelle_name'];?></td>
                                            <td><?php echo $getrow_com['quantity'];?></td>
                                            <td><?php echo $getrow_com['libelle'];?></td>
                                            <td><?php echo $getrow_com['carre_type_name'];?></td>
                                            <td><?php echo $getrow_com['total_price'];?></td>
                                            
                                        </tr>
                                     <?php 
                                            }
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
                
  <a href="<?php echo BASE_URL;?>pages/encaisser_commande_list.php">
      <button type="button" class="btn btn-default">Retour</button>
</a>  

            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>


<?php 
include('../templatepage/footer.php');
?>
