<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& ($_SESSION['Fonction']=='MD' OR $_SESSION['Fonction']=='AG')){
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

    <div IdUtilisateur="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header"> 
				<?php require_once ("Ajout/entete.php");?>
				
				<?php require_once ("Ajout/menu.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : AJOUT DES UTILISATEURS</small> 
				  <img src="IMA/users.jpg" width="80px" height="60px" margin-right:20px; border-radius:20px"/>
             </h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            AJOUT DES NOUVEAUX UTILISATEURS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                                       	<label>Numéro matricule de l'Agent</label>									
										<div class="form-group input-group">
										    <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                            <input type="text" class="form-control" name="NumMatric" placeholder="Numéro matricule" autocomplete="off" required >
                                        </div>
										
										<label>Nom et Post-nom de l'utilisateur</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="Noms" placeholder="Nom et post-nom de l'utilisateur" required >
                                        </div>
										
                                        <div class="form-group"> 
										<label>Sexe</label>                                           
                                            <select class="form-control" name="Sexe" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<option>MASCULIN</option>
												<option>FEMININ</option>																						
											</select>
                                        </div>
                                        
										<div class="form-group"> 
										<label>Etat civil</label>                                           
                                            <select class="form-control" name="EtatCivil" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<option>CELIBATAIRE</option>
												<option>MARIE(E)</option>												
												<option>DIVORCE(E)</option>												
												<option>VEUF(VE)</option>												
											</select>
                                        </div>
										
										<label>Numéro de téléphone (Facultatif)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                            <input type="text" class="form-control" name="NumTel" placeholder="Numéro de téléphone" >
                                        </div>
                                        
										<label>Adresse de résidence(Facultatif)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                            <input type="text" class="form-control" name="Adresse" placeholder="Adresse du domicile" >
                                        </div>
                                        
										<label>Titre académique </label>									
										<div class="form-group input-group">
										    <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
                                            <input type="text" class="form-control" name="Titre" placeholder="Niveau d'études" autocomplete="off" required >
                                        </div>	                                  									
                                </div>  
								
								<div class="col-lg-6">
                                       <div class="form-group"> 
										<label>Service d'appartenance de l'utilisateur</label>                                           
                                            <select class="form-control" name="IdService" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<?php
												require_once("BDD/Connect.php");
												$sel=mysql_query("SELECT * FROM Services");
												if(mysql_num_rows($sel)>0){
													while($row=mysql_fetch_array($sel)){
														echo "<option value='".$row['CodeService']."'>".$row['DesignService']."</option>";
													}
												}
												?>											
											</select>
                                        </div>
										<label>Nom d'accès attribué (Login)</label>									
										<div class="form-group input-group">
										    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="Login" placeholder="Nom d'utilisateur" autocomplete="off" required >
                                        </div>
										
										<label>Mot de passe attribué au nouvel utilisateur</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                            <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe attribué" required >
                                        </div>
										
										<label>Confirmez le mot de passe</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>*</span>
                                            <input type="password" class="form-control" name="Confirmation" placeholder="Confirmation du mot de passe" required >
                                        </div>										
											
                                        <div class="form-group"> 
										<label>Fonction du Nouvel utilisateur</label>                                           
                                            <select class="form-control" name="Fonction" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<option value="MD">MEDECIN DIRECTEUR</option>
												<option value="AG">AG</option>
												<option>MEDECIN</option>
												<option>COMPTABLE</option>
												<option>CAISSIER</option>
												<option>LABORANTIN</option>												
												<option>RECEPTIONNISTE</option>												
												<option>PHARMACIEN</option>												
											</select>
                                        </div>
                                        
										<div class="form-group"> 
										<label>Accès à la base de données</label>                                           
                                            <select class="form-control" name="Etat" required >
												<option value="">----Veuillez s&eacute;lectionner ici----</option>
												<option>AUTORISE</option>
												<option>NON AUTORISE</option>												
											</select>
                                        </div>
										
										<label>Photo de l'utilisateur (Facultatif)</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-film"></span>*</span>
                                            <input type="file" class="form-control" name="Photo" placeholder="Sélectionnez une photo" >
                                        </div>
                                                                               									
                                </div>
  
								<div class="col-lg-12">
									<center><button type="submit" class="btn btn-primary" name="Enregistrer"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer l'utilisateur <span class="glyphicon glyphicon-user"></span> </button></center>
								</div>
								
							 </form>
					<br/>
							 
<?php
	if(isset($_POST['Enregistrer'])){
		
		if($_POST['MotPasse'] == $_POST['Confirmation']){
			$NumMatric=$_POST['NumMatric'];
			$Noms=$_POST['Noms'];
			$Sexe=$_POST['Sexe'];
			$EtatCivil=$_POST['EtatCivil'];
			$NumTel=$_POST['NumTel'];
			$Adresse=$_POST['Adresse'];
			$Titre=$_POST['Titre'];
			$IdService=$_POST['IdService'];
			$Login=$_POST['Login'];
			$MotPasse=$_POST['MotPasse'];
			$Fonction = $_POST['Fonction'];
			$Etat = $_POST['Etat'];
			$Photo=$_FILES["Photo"]["name"];
			
			require_once("BDD/connect.php");
			$search=mysql_query("SELECT * FROM Utilisateurs WHERE Utilisateurs.Login='$Login'");
			
			if (mysql_num_rows($search)>0){
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <span class='glyphicon glyphicon-alert'></span>  Attention, ce Login est déjà utilisé par un autre agent! veuillez le changer puis réessayer.</div></div>";
			}
			else{
				if($Photo !=""){
					$select = mysql_query("SELECT max(IdUtilisateur) FROM Utilisateurs");
					$donnees = mysql_fetch_array($select);
					$numero = $donnees[0]+1;

					$dossier = 'Users/';
					$taille_maxi = 10000000;
					$taille = filesize($_FILES['Photo']['tmp_name']);
					$extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
					$Photo = basename($_FILES['Photo']['name']); // indique le nom du Photo local
					$extension = strrchr($_FILES['Photo']['name'], '.'); // séparation de l'extension ex : .jpg du nom du Photo local

					$Photo = "imgUser000".$numero.$extension; // renomme $Photo par le nom souhaité en rajoutant $extension


					//Début des vérifications de sécurité...
					if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
					{

						 $erreur = "Vous devez uploader un Photo de type png, gif, jpg, jpeg";

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
							$req="INSERT INTO Utilisateurs VALUES('','$NumMatric','$Noms','$Sexe','$EtatCivil','$NumTel','$Adresse','$Titre','$Fonction','$IdService','$Login', '$MotPasse','$Etat','$Photo')";
							$result=mysql_query($req);
								if (!$result){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement </div></div>";
								}
								else{ 
									echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Nouvel utilisateur ajouté avec sa photo</div></div>";
								}
						}
						else{
							if($Sexe=='MASCULIN'){
								$req="INSERT INTO Utilisateurs VALUES('','$NumMatric','$Noms','$Sexe','$EtatCivil','$NumTel','$Adresse','$Titre','$Fonction','$IdService','$Login', '$MotPasse','$Etat','UserDefaultMal.png')";
								$result=mysql_query($req);
							}
							else{
								$req="INSERT INTO Utilisateurs VALUES('','$NumMatric','$Noms','$Sexe','$EtatCivil','$NumTel','$Adresse','$Titre','$Fonction','$IdService','$Login', '$MotPasse','$Etat','UserDefaultFem.png')";
								$result=mysql_query($req);
							}
								if (!$result){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement </div></div>";
								}
								else{ 
									echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Nouvel utilisateur ajouté sans aucune photo</div></div>";
								}
						}
					}else{
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span>".$erreur."</div></div>";
					}
				}
				else{
					if($Sexe=='MASCULIN'){
						$req="INSERT INTO Utilisateurs VALUES('','$NumMatric','$Noms','$Sexe','$EtatCivil','$NumTel','$Adresse','$Titre','$Fonction','$IdService','$Login', '$MotPasse','$Etat','UserDefaultMal.png')";
						$result=mysql_query($req);
					}
					else{
						$req="INSERT INTO Utilisateurs VALUES('','$NumMatric','$Noms','$Sexe','$EtatCivil','$NumTel','$Adresse','$Titre','$Fonction','$IdService','$Login', '$MotPasse','$Etat','UserDefaultFem.png')";
						$result=mysql_query($req);
					}
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec d'enregistrement </div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> Nouvel utilisateur ajouté sans aucune photo</div></div>";
					}
				}
			}
		}else{
			echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove-sign'></span> Vous avez mal confirmé votre mot de passe ! </div></div>";
			}
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
		header('Location:index.php');
	}
?>