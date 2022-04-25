<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
if(isset($_POST['libelle']))
{
     $get_result_data=$obj_managecafe->list_gest_menu_search($_POST['libelle']);
}
else
{
    $get_result_data=$obj_managecafe->list_gest_menu();
}
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion De Menu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                             <ul class="removehover" style='list-style:none;'>
                                <li>
                        <span class="glyphicon glyphicon-plus"></span>
                                    <a class="active" href="add_gest_menu.php"> Ajouter Element de menu</a>
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
                                            <td><b>Filtrer par categorie : <b></td>
                                            <td>
                                            <select class="form-control required" name="libelle">
                                             <?php 
                                                 $result_get_type=$obj_managecafe->get_libelle_type();

                                                while($row1=mysql_fetch_array($result_get_type))
                                                {
                                            ?>
                                             <option value="<?php echo $row1['id'];?>"><?php echo $row1['libelle_name'];?></option>
                                            <?php 
                                                }
                                            ?>
                                            </select>
                                            </td>
                                        </tr>
                                        <tr align="center">
                                            <td> 
                                                <button type="submit" name="submit" class="btn btn-default">Ajouter</button>
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
                                            <th>ID</th>
                                            <th>Libelle</th>
                                            <th>Description</th>
                                            <th>PU</th>
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
                                            <td><?php echo $row1['libelle_name'];?></td>
                                            <td><?php echo $row1['description'];?></td>
                                            <td><?php echo $row1['PU'];?></td>
                                            <td>
                                                    <a href="<?php echo BASE_URL;?>pages/edit_gest_menu.php?getid=<?php echo $row1['id'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
        
                                                     <a href="javascript:delete_menu(<?php echo $row1['id'];?>)">

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
    
    $obj_managecafe->delete_gest_menu($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="gest_menu.php";
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
