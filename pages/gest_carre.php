<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des Carre</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                             <ul class="removehover" style='list-style:none;'>
                                <li>
                        <span class="glyphicon glyphicon-plus"></span>
                                    <a class="active" href="add_gest_carre.php"> Ajouter Carre</a>
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
                                            <th>ID</th>
                                            <th>Le Carre </th>
                                            <th>PU</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        $care_list=$obj_managecafe->get_carre_list();
                                        while($get_care=mysql_fetch_array($care_list))
                                        {
                                      ?>
                                        <tr>
                                            <td><?php echo $get_care['id'];?></td>
                                            <td><?php echo $get_care['carre_type_name'];?></td>
                                            <td><?php echo $get_care['carre_amt'];?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL;?>pages/edit_gest_carre.php?getid=<?php echo $get_care['id'];?>">
                                                    <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>

                                                 <a href="javascript:delete_gest_carre(<?php echo $get_care['id'];?>)">

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
    
    $obj_managecafe->delete_carre($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="gest_carre.php";
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
function delete_gest_carre(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='gest_carre.php?delgetid='+id;

     }
}
</script>
