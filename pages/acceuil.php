<?php   
require("../templatepage/header.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To Gestion Cafe</h1>
    <form method="POST" action="user_traitement.php">
    <p>
	<table id="champs_connexion">
	<tr>
		<td>Login : </td>
		<td><input name="login"  type="text"/></td>
	</tr>
	<tr>
		<td>Password :</td>
		<td><input name="pass" type="password"/></td>
	</tr>
	<tr>
		<td><input name="valider" type="submit" value="OK"/></td>
        <td><a href="inscription.php">Pas encore membre?</a></td>
	</tr>
	</table>

	<?php if(isset($_SESSION['message'])) 
		     echo $_SESSION['message']; ?></td>
	
</form>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php 
require("../templatepage/footer.php");
?>
  