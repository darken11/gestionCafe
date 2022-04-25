<?php 
include('../templatepage/header.php');
require("managecafe.php");
$obj_managecafe=new Managecafe();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des Serveurs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                 <div class="col-lg-12">
                             <ul class="removehover" style='list-style:none;'>
                                <li>
                        <span class="glyphicon glyphicon-plus"></span>
                                    <a class="active" href="add_gest_serveurs.php"> Ajouter Serveur</a>
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
                                            <th>ID Utilisateur</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Time Work</th>
                                            <th>Adresse</th>
                                            <th>Login</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php 
                                        $get_results=$obj_managecafe->display_ajouter_serveurs();
                                        while($get_res=mysql_fetch_array($get_results))
                                        {
                                      ?>
                                        <tr>
                                            <td><?php echo $get_res['id'];?></td>
                                            <td><?php echo $get_res['nom'];?></td>
                                            <td><?php echo $get_res['prenom'];?></td>
                                            <td>
                                                <?php 
                                                    if($get_res['time_work']==1)
                                                    {
                                                        echo "11:00 AM to 3:00 PM ";
                                                    }
                                                    else
                                                    {
                                                        echo "3:00 PM to 11:00 PM ";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $get_res['addresse'];?></td>
                                            <td><?php echo $get_res['login'];?></td>
                                            <td>
                                                <a href="<?php echo BASE_URL;?>pages/edit_gest_serveurs.php?getid=<?php echo $get_res['id'];?>">
                                                    <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                    </button>
                                                </a>

                                                 <a href="javascript:delete_gest_serveurs(<?php echo $get_res['id'];?>)">

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
    
    $obj_managecafe->delete_ajouter_serveurs($_REQUEST['delgetid']);
?>
    <script>
        window.location.href="gest_serveurs_list.php";
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
function delete_gest_serveurs(id)
{
     if(confirm('Are You Sure To Remove This Record ?'))
     {
        window.location.href='gest_serveurs_list.php?delgetid='+id;

     }
}
</script>
