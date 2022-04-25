<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
$get_result_data=$obj_managecafe->list_gest_menu();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des Commandes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                             <ul class="removehover" style='list-style:none;'>
                                <li>
                        <span class="glyphicon glyphicon-plus"></span>
                                    <a class="active" href="gest_commande_add_serveur.php"> Ajouter Commande
                                    </a>
                                </li>
                            </ul>

                    <!-- /.panel -->
                </div>
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
                                            <th>Statut</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $get_gest_comm=$obj_managecafe->list_gest_commande();
                                        while($get_row1=mysql_fetch_array($get_gest_comm))
                                        {
                                         if($get_row1['status']==0)
                                         {   
                                    ?>
                                        <tr>
                                            <td><?php echo $get_row1['id'];?></td>
                                            <td><?php echo $get_row1['curr_date'];?></td>
                                            <td><?php echo $get_row1['serveurs_id'];?></td>
                                            <td><?php echo $get_row1['table_no'];?></td>
                                            <td>
                                                <?php 
                                                     if($get_row1['status']==0)
                                                     {
                                                        echo "Impaye";
                                                     }
                                                     else
                                                     {
                                                        echo "Paid";
                                                     }
                                                ?>
                                            </td>
                                            <td><?php echo $get_row1['total_amount'];?></td>
                                            <td>
                                                    <a href="<?php echo BASE_URL;?>pages/edit_gest_commande.php?getun_id=<?php echo $get_row1['setidunique'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
        
                                                     <a href="javascript:delete_commande(<?php echo $get_row1['id'];?>)">

                                                        <button class="btn btn-danger btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-trash"></span>
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

if(isset($_REQUEST['delgetid']))
{
    
    $obj_managecafe->delete_des_commande($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="gest_commande_list.php";
    </script>
<?php
}
?>

<style>
.removehover a:hover
{
    text-decoration: none
}
</style>

<script>
function delete_commande(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='gest_commande_list.php?delgetid='+id;

     }
}
</script>
