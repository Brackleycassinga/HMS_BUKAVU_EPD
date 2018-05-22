<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']='RECEPTIONNISTE'){
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
				
				<?php require_once ("Ajout/menuRecept.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : LES MALADES </small> 
				  <img src="IMA/patientMal.png" width="120px" height="80px"/> <img src="IMA/2.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            RECHERCHE ET MODIFICATION DES PATIENTS
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade à rechercher</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-primary">
									<div class="panel-body">
										<p> Un mot suffit pour votre recherche, vous pouvez saisir un code ou un 
											nom du malade à rechercher dans la base de données.</p>
									</div>
										
								</div>
                             </div>
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Patients WHERE Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%'") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>CODE</th>
																<th>DATE D'ARRIVEE</th>
																<th>PHOTO DU MALADE</th>
																<th>NOMS COMPLETS DU MALADE</th>
																<th>SEXE</th>
																<th>AGE</th>
																<th>PROFESSION</th>
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											$DateArrive = new DateTime($row['DateArrive']);
											$DateArrive = Date_Format($DateArrive,'d-m-Y');
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodePatient'];?></td>
                                            <td><?php echo $DateArrive ;?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['Age'];?></td>                                          
                                            <td><?php echo $row['Profession'];?></td>                                          
                                            <td><?php echo "<a href='ModifPatients.php?id=".$row['Idauto_Patient']."' title='Modifier le patient'><span class='glyphicon glyphicon-edit'></span> Modifier</a>";?></td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune suggestion trouvée pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>

					<?php 
						if(isset($_GET['id'])){
						require_once("BDD/connect.php");
						$sql=mysql_query("SELECT * FROM Patients WHERE Idauto_Patient='".$_GET['id']."'");
						while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
						<div class="col-lg-4">
							
							<label>Code du Patient</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
                            </div>
							
							<label>Index du Malade</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>                                        
								<input type="text" class="form-control" name="IndexMal" value="<?php echo $row['IndexMal']; ?>"  >
                            </div>
							<label>Nom et Post-nom du Patient</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" required >
                            </div>
							<label>Age du Patient</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>                                          
								<input type="text" class="form-control" name="Age" value="<?php echo $row['Age']; ?>" required >
                            </div>
							<label>Sexe</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span><span class="fa fa-female"></span></span>                                        
								<select class="form-control" name="Sexe" required >
									<option><?php echo $row['Sexe']; ?></option>
									<option>MASCULIN</option>
									<option>FEMININ</option>
								</select>
                            </div>
							
                        </div>
                       	
						<div class="col-lg-4">
							<label>Profession exercée</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span> </span>                                           
								<input type="text" class="form-control" name="Profession" value="<?php echo $row['Profession']; ?>"  >
                            </div>
							
							<label>Etat Civil</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span></span></span>                                        
								<select class="form-control" name="EtatCivil" required >
									<option><?php echo $row['EtatCivil']; ?></option>
									<option>CELIBATAIRE</option>
									<option>MARIE(E)</option>
									<option>DIVORCE(E)</option>
									<option>VEUF(VE)</option>
								</select>
                            </div>
							
							<label>Adresse de Résidence</label>
							<div class="form-group input-group">							
								<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>                                       
								<input type="text" class="form-control" name="Adresse" value="<?php echo $row['Adresse']; ?>" />
                            </div>
							
							<label>Numéro de Téléphone</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-phone"></span></span>                                          
								<input type="text" class="form-control" name="NumTel" value="<?php echo $row['NumTel']; ?>" >
                            </div>
							
                        </div>
						<div class="col-lg-4">
							<label>Sélectionnez une nouvelle photo (Facultatif)</label>
                            <div class="form-group input-group"> 	                                       
								<input type="file" class="form-control" name="Photo" >
								<input type="hidden" name="Photo_old" value="<?php echo $row["Photo"]; ?>" />
                            </div>
							<center>
								<label>Photo actuelle</label>
								<div class="form-group input-group"> 	
									<td><?php echo "<img  width=\"110\" height=\"110\" src=";
										echo '"Patients/';
										echo $row["Photo"];
										echo '"/>';?></td>								
								</div>
							</center>
						
                        </div>
						
                        <br/>
						
                        </div>
                       					
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications</button></center>
						</div>					
					</form>
				
					<?php } }?>

							
<?php
		if(isset($_POST['Modifier'])){
		
			$Idauto_Patient=$_POST['Idauto_Patient'];
			$CodePatient=$_POST['CodePatient'];
			$IndexMal=$_POST['IndexMal'];
			$Noms=$_POST['Noms'];
			$Sexe=$_POST['Sexe'];
			$Age=$_POST['Age'];
			$Profession=$_POST['Profession'];
			$EtatCivil=$_POST['EtatCivil'];
			$NumTel=$_POST['NumTel'];
			$Adresse=$_POST['Adresse'];
			$Photo=$_POST["Photo_old"];
			
			require_once("BDD/connect.php");
			
				if ($_FILES["Photo"]["name"]!=""){
					$Photo=$_FILES["Photo"]["name"];
					$select = mysql_query("SELECT max(Idauto_Patient) FROM Patients");
					$donnees = mysql_fetch_array($select);
					$numero = $donnees[0]+1;

					$dossier = 'Patients/';
					$taille_maxi = 10000000;
					$taille = filesize($_FILES['Photo']['tmp_name']);
					$extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
					$Photo = basename($_FILES['Photo']['name']); // indique le nom du Photo local
					$extension = strrchr($_FILES['Photo']['name'], '.'); // séparation de l'extension ex : .jpg du nom du Photo local

					$Photo = "imgpatient000".$numero.$extension; // renomme $Photo par le nom souhaité en rajoutant $extension

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
							$req="UPDATE Patients SET IndexMal='".$IndexMal."',Noms='".$Noms."', Age='".$Age."', Sexe='".$Sexe."', Profession='".$Profession."', EtatCivil='".$EtatCivil."', Adresse='".$Adresse."',NumTel='".$NumTel."', Photo='".$Photo."' WHERE Idauto_Patient='".$Idauto_Patient."'";
							$result=mysql_query($req);
								if (!$result){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec de modification du malade! Veuillez réessayer!</div></div>";
								}
								else{ 
									echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span>Modification effectuée avec succès et la photo a été mise à jour!</div></div>";
								}
						}
						else{
							$req="UPDATE Patients SET IndexMal='".$IndexMal."',Noms='".$Noms."', Age='".$Age."', Sexe='".$Sexe."', Profession='".$Profession."', EtatCivil='".$EtatCivil."', Adresse='".$Adresse."',NumTel='".$NumTel."' WHERE Idauto_Patient='".$Idauto_Patient."'";
							$result=mysql_query($req);
								if (!$result){
									echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec de modification du malade! Veuillez réessayer: </div></div>";
								}
								else{ 
									echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Modification du Malade effectuée avec succès</div></div>";
								}
						}
					}else{
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span>".$erreur."</div></div>";
					}
				}
				else{
					$req="UPDATE Patients SET IndexMal='".$IndexMal."',Noms='".$Noms."', Age='".$Age."', Sexe='".$Sexe."', Profession='".$Profession."', EtatCivil='".$EtatCivil."', Adresse='".$Adresse."',NumTel='".$NumTel."' WHERE Idauto_Patient='".$Idauto_Patient."'";
					$result=mysql_query($req);
						if (!$result){
							echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-remove'></span>Echec de modification du malade! Veuillez réessayer: </div></div>";
						}
						else{ 
							echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span> Modification du Malade effectuée avec succès</div></div>";
						}
				}
			
		}
?>
						 
					</div>                           
                </div>           
			</div>
		</div>
    </div>


	
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