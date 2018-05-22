<?php 
	session_start();
		if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])){
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NEW HOPE HOSPITAL</title>
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/timeline.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
	<link href="bootstrap/css/anim.css" rel="stylesheet" />
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<style>

</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php if ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')
							require_once ("Ajout/menu.php");
					elseif ($_SESSION['Fonction']=='LABORANTIN')
							require_once ("Ajout/menuLabo.php");
					elseif ($_SESSION['Fonction']=='RECEPTIONNISTE')
						require_once ("Ajout/menuRecept.php");
					elseif ($_SESSION['Fonction']=='CAISSIER')
						require_once ("Ajout/menuCaissier.php");
					elseif ($_SESSION['Fonction']=='PHARMACIEN')
						require_once ("Ajout/menuPharmacie.php");
					elseif ($_SESSION['Fonction']=='COMPTABLE')
						require_once ("Ajout/menuCompt.php");
					elseif ($_SESSION['Fonction']=='MEDECIN')
						require_once ("Ajout/menuMedecin.php");						
				?>
				
            </div>
            <?php if ($_SESSION['Fonction']=='ENSEIGNANT')
						require_once ("Ajout/navDroitEns.php");
					else
						require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : COMPTE D'UTILISATEUR</small>
					 <img src="IMA/5.jpg" width="100px" height="80px"/>
             </h1>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            MODIFICATION DE LA PHOTO DU COMPTE DE [ <?php echo $_SESSION['Noms'];?> ]
                        </div>
                        <div class="panel-body">
                            <div class="row">
								<div class="col-lg-2">                                    
                                </div> 
								<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">                                      
									<div class="col-lg-6">                                   
                                        <div class="form-group input-group">
											<label>Sélectionnez une nouvelle photo</label>                                           
                                            <input type="file" class="form-control" name="Photo" placeholder="Nouvelle photo" required >
                                        </div>
										<br/>
										<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Modifier la photo du compte <span class="fa fa-photo"></span> </button></center> 
                                    </div> 
									<div class="col-lg-2">
                                        <?php
											require_once("BDD/Connect.php");
											$sql=mysql_query("SELECT * FROM Utilisateurs WHERE Utilisateurs.IdUtilisateur='".$_SESSION['IdUtilisateur']."'") or die(mysql_error());
											$li=mysql_fetch_array($sql);
										?> 
										<div class="form-group input-group">
											<label>Photo actuelle</label>                                           
                                                                      
											<center><td><?php echo "<img  width=\"120\" height=\"120\" src=";
											  echo '"Users/';
											  echo $li["Photo"];
											  echo '"/>';?></td>
											</center> 
										</div>  
									</div> 
								</form>								
							</div> 								
							 
					<br/>
							 
							 
<?php
	if(isset($_POST['Modifier'])){
		$select = mysql_query("SELECT max(IdUtilisateur) FROM Utilisateurs");
				$donnees = mysql_fetch_array($select);
				$numero = $donnees[0]+1;

				$dossier = 'Users/';
				$taille_maxi = 10000000;
				$taille = filesize($_FILES['Photo']['tmp_name']);
				$extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
				$Photo = basename($_FILES['Photo']['name']); // indique le nom du Photo local
				$extension = strrchr($_FILES['Photo']['name'], '.'); // séparation de l'extension ex : .jpg du nom du Photo local

				$Photo = "imgUser".$numero.$extension; // renomme $Photo par le nom souhaité en rajoutant $extension


				//Début des vérifications de sécurité...
				if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
				{
					 $erreur = "Vous devez uploader une Photo de type png, gif, jpg, jpeg";
				}
				if($taille>$taille_maxi)
				{
					 $erreur = "Le Photo est trop gros...";
				}
				if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
				{
					 //On formate le nom du Photo ici...
					 $Photo = strtr($Photo, 
						  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
						  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
					 $Photo = preg_replace('/([^.a-z0-9]+)/i', '-', $Photo);
					 if(move_uploaded_file($_FILES['Photo']['tmp_name'], $dossier . $Photo)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
					 {
						$req="UPDATE Utilisateurs SET Photo='".$Photo."' WHERE IdUtilisateur='".$_SESSION['IdUtilisateur']."'";
						$result=mysql_query($req);
						
					 }
				}
				else{
					echo $erreur;
				}
		header('Location: EditUsersPhoto.php');		
	}
?>
							 
							</div>
                            <!-- /.row (nested) -->
                        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    <!-- /#wrapper -->


	
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php 
	}else{
		 header("Location:index.php");
	}
 ?>