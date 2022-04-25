<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
$get_result_data=$obj_managecafe->list_du_carre();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion Des Carres</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                             <ul class="removehover" style='list-style:none;'>
                                <li>
                        <span class="glyphicon glyphicon-plus"></span>
                                    <a class="active" href="add_gest_ducarre.php"> Ajouter Carre</a>
                                </li>
                            </ul>

                    <div class="panel panel-default">
                   
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
                                            <th>ID Carre</th>
                                            <th>Libelle</th>
                                            <th>La Majoration</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                         while($row1=mysql_fetch_array($get_result_data))
                                         {
                                      ?>
                                        <tr>
                                            <td><?php echo $row1['id'];?></td>
                                            <td><?php echo $row1['libelle'];?></td>
                                            <td><?php echo $row1['la_major'];?></td>
                                            <td>
                                        <a href="<?php echo BASE_URL;?>pages/edit_gest_ducarre.php?getid=<?php echo $row1['id'];?>">
                                            <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                        </a>

                                         <a href="javascript:delete_gest_ducaarre(<?php echo $row1['id'];?>)">

                                            <button class="btn btn-danger btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
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
    
    $obj_managecafe->delete_du_carre($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="gest_ducarre.php";
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
function delete_gest_ducaarre(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='gest_ducarre.php?delgetid='+id;

     }
}
</script>
