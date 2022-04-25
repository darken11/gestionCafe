<?php 
ob_start();
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
if(isset($_POST['submit']))
{
    if(isset($_POST['libelle']))
    {
     $get_res_table=$obj_managecafe->ajouter_table_list_search($_POST['libelle']);
    }
}
else
{

    $get_res_table=$obj_managecafe->ajouter_table_list(); 

}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                             <ul class="removehover" style='list-style:none;'>
                                <li>
                        <span class="glyphicon glyphicon-plus"></span>
                                    <a class="active" href="add_ajouter_table.php"> Ajouter Table</a>
                                </li>
                            </ul>

                    <div class="panel panel-default">
                     <!--    <div class="panel-heading">
                            
                        </div> -->
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table>
                                    <form class="form-horizontal" method="post" action="">

                                        <tr>
                                            <td><b>Filtrer par Carre : <b></td>
                                            <td>
                                            <select class="form-control required" name="libelle">
                                             <?php 
                                                 $result_get_carre=$obj_managecafe->get_gest_le_carre();

                                                while($row1=mysql_fetch_array($result_get_carre))
                                                {
                                            ?>
                                             <option value="<?php echo $row1['id'];?>"><?php echo $row1['carre_type_name'];?></option>
                                            <?php 
                                                }
                                            ?>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr align="center">
                                            <td> 
                                                <button type="submit" id="searchdata" name="submit" class="btn btn-default">Filtrer</button>
                                            </td> 
                                        </tr>
                                    </form>

                                                                   
                                </table>
                            </div>
                            <!-- /.table-responsive--> 
                        </div> 
                        <!-- /.panel-body -->
                    </div>
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
                                            <th>ID Table</th>
                                            <th>Libelle</th>
                                            <th>Le Carre</th>
                                            <th>Numero Table</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    

                                    <tbody>
                                     <?php 
                                      // if(isset($_POST['submit']))
                                      //    {
                                      //        $getid=$_POST['libelle'];
                                      //        $get_res_table=$obj_managecafe->get_ajouter_table($getid); 
 
                                       
                                        while($res_table=mysql_fetch_array($get_res_table))
                                        {
                                     ?>
                                        <tr>
                                            <td><?php echo $res_table['ajtb_id'];?></td>
                                            <td><?php echo $res_table['libelle'];?></td>
                                            <td><?php echo $res_table['carre_type_name'];?></td>
                                            <td><?php echo $res_table['numbero_table'];?></td>
                                            <td>
                                                    <a href="<?php echo BASE_URL;?>pages/edit_ajouter_table.php?ajtbid=<?php echo $res_table['ajtb_id'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
        
                                                     <a href="javascript:delete_gestiontable(<?php echo $res_table['ajtb_id'];?>)">

                                                        <button class="btn btn-danger btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                        </button> 
                                                    </a>
                                            </td>
                                        </tr>
                                       <?php
                                        } 
                                             //}
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
    
    $obj_managecafe->delete_ajouter_table($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="gest_table_list.php";
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
function delete_gestiontable(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='gest_table_list.php?delgetid='+id;

     }
}
