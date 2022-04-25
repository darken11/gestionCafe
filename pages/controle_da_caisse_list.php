<?php
ob_start(); 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();

if(isset($_POST['submit']))
{
    $setdate= $_POST['getthedate'];
    $setdate3=date('Y-m-d',strtotime($setdate));
    $get_list=$obj_managecafe->list_gest_commande_search($setdate3);


}
else
{
    $get_list=$obj_managecafe->list_gest_commande();

}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Controle De la caisse</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
             
                     <!--    <div class="panel-heading">
                            
                        </div> -->

                  <div class="col-lg-12">
                     <!--    <div class="panel-heading">
                            
                        </div> -->
                        <!-- /.panel-heading -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      $get_tot=$obj_managecafe->get_total_amt_all();

                                        while($getrow=mysql_fetch_array($get_tot))
                                        {
                                     ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    if(isset($_REQUEST['respone']))
                                                    {
                                                        echo "0";
                                                    } 
                                                    else
                                                    {
                                                    echo $getrow['totalamt'];
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                              <a href="<?php echo BASE_URL;?>pages/controle_da_caisse_list.php?respone=0">

                                                    <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                    </button> 
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    <?php 
                                        }
                                    ?>                                    
                                    </tbody>
                                </table>
                    </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table>
                                    <form class="form-horizontal" method="post" action="">

                                        <tr>
                                            <td><b>Filtrer par Date : <b></td>
                                            <td>
                                                <input type="text" id="datepicker" name="getthedate" value=""></p>
                                            </td>
                                        </tr>
                                        <tr align="center">
                                            <td> 
                                                <button type="submit"  name="submit" class="btn btn-default">Filtrer</button>
                                            </td> 
                                        </tr>
                                    </form>
                                </table>
                                                                   
                            </div>
                            <!-- /.table-responsive--> 
                        </div> 
                        <!-- /.panel-body -->
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
                                        while($getres1=mysql_fetch_array($get_list))
                                        {
                                            if($getres1['status']==1)
                                            {
                                    ?>
                                        <tr>
                                            <td><?php echo $getres1['id'];?></td>
                                            <td><?php echo $getres1['curr_date'];?></td>
                                            <td><?php echo $getres1['serveurs_id'];?></td>
                                            <td><?php echo $getres1['table_no'];?></td>
                                            <td>
                                                <?php 
                                                    if($getres1['status']==1)
                                                    {
                                                        echo "Paye";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $getres1['total_amount'];?></td>
                                            <td>
                                                    <a href="<?php echo BASE_URL;?>pages/details_ligde_commande2.php?getun_id=<?php echo $getres1['setidunique'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-check"></span>
                                                        </button>
                                                    </a>
                                                    
                                                    <a href="<?php echo BASE_URL;?>pages/print_thebill2.php?getun_id=<?php echo $getres1['setidunique'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-print"></span>
                                                        </button>
                                                    </a>

                                                       <a href="javascript:delete_controle_da_caisse(<?php echo $getres1['id'];?>)">

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
    
    $obj_managecafe->delete_des_controle_dacaisse($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="controle_da_caisse_list.php";
    </script>
<?php
}
?>
<script>
function delete_controle_da_caisse(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='controle_da_caisse_list.php?delgetid='+id;

     }
}
</script>


    <script src="<?php echo BASE_URL;?>js/jquery-ui.js"></script>
<script>
  jQuery(function() {

    jQuery("#datepicker").datepicker();
  });
  </script>