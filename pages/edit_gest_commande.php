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
                                            <th>Action</th>
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
                                            <td><?php echo $getrow_com['description'];?></td>
                                            <td><?php echo $getrow_com['quantity'];?></td>
                                            <td><?php echo $getrow_com['libelle'];?></td>
                                            <td><?php echo $getrow_com['carre_type_name'];?></td>
                                            <td><?php echo $getrow_com['total_price'];?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL;?>pages/edit_ligne_commande.php?getid=<?php echo $getrow_com['idunique_get']."&aj_comid=".$getrow_com['idajcom'];?>">
                                                    <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>

                                                 <a href="javascript:delete_gest_lignescommande(<?php echo $getrow_com['idajcom'];?>)">

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
                
<form method="post" action="set_total_amt.php">
      <input type="hidden" name="setunid" id="setunid" value="<?php echo $_REQUEST['getun_id'];?>">
      <?php 
        $uni_getid=$_REQUEST['getun_id'];
        $get_resdata=$obj_managecafe->get_total_amt($uni_getid);
        while($getrowcom=mysql_fetch_array($get_resdata))
        {
      ?>
      <input type="hidden" name="set_totalamount" value="<?php echo $getrowcom['totalamt'];?>">
      <?php 
        }
      ?>
      <button type="submit" name="submit" class="btn btn-default">Retour</button>

</form>  

            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>


<?php 
include('../templatepage/footer.php');

if(isset($_REQUEST['delgetid']) AND isset($_REQUEST['getun_id']))
{
    
    $obj_managecafe->delete_ajouter_commande($_REQUEST['delgetid'],$_REQUEST['getun_id']);
?>
<script>
var unid=document.getElementById("setunid").value;
window.location.href='edit_gest_commande.php?getun_id='+unid;
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
function delete_gest_lignescommande(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        var unid=document.getElementById("setunid").value;
        window.location.href='edit_gest_commande.php?delgetid='+id+"&getun_id="+unid;

     }
}
</script>
