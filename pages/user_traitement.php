<?php session_start();
include 'fonctions.php';
	$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :</br>";
	$message = $msg_erreur;
	$_SESSION['message']='';
	
	if (empty($_POST['login']))
         $message .= "Votre login<br/>";
        

        if (strlen($message) > strlen($msg_erreur)) {
        $_SESSION['message']= $message;
		header('Location: authentification.php');
        }
	else{

		$login = ($_POST['login']);
		
		$pdo = connect();
		$requete ="SELECT id_seveur FROM ajouter_serveurs WHERE login = ?";
		$reqpreparee = $pdo ->prepare($requete);
		$reqpreparee ->execute(array($login);	
		}
			
	if($reqpreparee === FALSE)
		{	
			echo 'Il y a une erreur dans votre requête sélection : ';
			echo $req;
			die();
		}
	$resultatreqprep = $reqpreparee->fetchall();
	if(count($resultatreqprep) === 0)
		{
			$_SESSION['message']= 'Login erronés';
			header('Location: authentification.php');
			die();
		}
	else
		
			
			
			{
			$_SESSION['login'] = $login ;
			$_SESSION['id_clientzzzz']=$resultatreqprep[0] ['id_client'];
			$_SESSION ['date_debut'] = date("Y-m-d H:i:s");
			$client=$_SESSION['id_client'];
			$req = "INSERT INTO logs (id_client,date_debut) VALUES ('".$client."','".$_SESSION['date_debut']."')";
			
			if($pdo->exec($req) === FALSE)
				{
					echo 'Il y a une erreur dans votre requête d\'insertion.';
					echo $req;
					exit();
				}
				
			$req2 ="Select id_log from logs WHERE date_debut ='".$_SESSION['date_debut']."'";
			$res2 = $pdo->query($req2);
			$_SESSION['id_log'] = $res2->fetch();
			
			header('Location: index.php');
			}
		}

    
$reqpreparee->closeCursor();
		
?>