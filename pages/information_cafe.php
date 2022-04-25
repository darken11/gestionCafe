<?php 
require('../templatepage/header.php');
require("managecafe.php");

$obj_managecafe=new Managecafe();

 $getthe_res=$obj_managecafe->getinformationcafe();
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Information Cafe</h1>
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
                                            <th>Raison Social</th>
                                            <th>Addresse</th>
                                            <th>Ville</th>
                                            <th>Telephone</th>
                                            <th>Fax</th>
                                            <th stype="width:200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($row1=mysql_fetch_array($getthe_res))
                                            {
                                         ?>
                                        <tr>
                                            <td><?php echo $row1['raison_soc'];?></td>
                                            <td><?php echo $row1['addresse'];?></td>
                                            <td><?php echo $row1['ville'];?></td>
                                            <td><?php echo $row1['telephone'];?></td>
                                            <td><?php echo $row1['fax'];?></td>
                                            <td>
                                                    <a href="<?php echo BASE_URL;?>pages/editinformation.php?getid=<?php echo $row1['id'];?>">
                                                        <button class="btn btn-primary btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </a>
                                                 <!--    <button class="btn btn-danger btn-xs" data-target="#edit" data-toggle="modal" data-title="Edit">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                    </button> -->

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
?>