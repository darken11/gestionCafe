<?php
ob_start(); 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
if(isset($_REQUEST['encs_id']))
{
    $obj_managecafe->set_gestlist_status($_REQUEST['encs_id']);
    header("location:encaisser_commande_list.php");
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Encaissement des Commandes</h1>
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
                                            <th>ID Commande</th>
                                            <th>Date</th>
                                            <th>Serveur</th>
                                            <th>Table</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $get_list=$obj_managecafe->list_gest_commande();
                                        while($getres1=mysql_fetch_array($get_list))
                                        {
                                            if($getres1['status']==0)
                                            {
                                    ?>
                                        <tr>
                                            <td><?php echo $getres1['id'];?></td>
                                            <td><?php echo $getres1['curr_date'];?></td>
                                            <td><?php echo $getres1['serveurs_id'];?></td>
                                            <td><?php echo $getres1['table_no'];?></td>
                                            <td><?php echo $getres1['total_amount'];?></td>
                                            <td>
                                                    <a href="<?php echo BASE_URL;?>pages/details_ligde_commande.php?getun_id=<?php echo $getres1['setidunique'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-check"></span>
                                                        </button>
                                                    </a>
                                                    
                                                    <a href="<?php echo BASE_URL;?>pages/print_thebill.php?getun_id=<?php echo $getres1['setidunique'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-print"></span>
                                                        </button>
                                                    </a>

                                                      <a href="<?php echo BASE_URL;?>pages/encaisser_commande_list.php?encs_id=<?php echo $getres1['id'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-thumbs-up"></span>
                                                        </button>
                                                    </a>
                                            </td>
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
                
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>


<?php 
include('../templatepage/footer.php');
?>