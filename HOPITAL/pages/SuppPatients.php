<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='RECEPTIONNISTE'){
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
				  <img src="IMA/patientMal.png" width="120px" height="80px"/> <img src="IMA/11.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            RECHERCHE ET SUPPRESSION DES PATIENTS DANS LA BASE DE DONNEES
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Le Code ou Nom du Malade à rechercher</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour rechercher" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-danger" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>
							 <div class="col-lg-6">
								<div class="panel panel-red">
									<div class="panel-heading">
										<strong>REMARQUES</strong>
									</div>
									<div class="panel-body">
										<p> Une fois afficher le patient à supprimer, vous devez confirmer la suppression. Mais, si celui a 
											déjà eu d'autres services (comme la consultation, les examens, etc...); Pour le supprimer,
											vous devez demandé aux concernés de ces services d'annuler ou de supprimer les opérations enregistrées. </p>
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
																<th>PHOTO DU MALADE</th>
																<th>NOMS COMPLETS DU MALADE</th>
																<th>SEXE</th>
																<th>AGE</th>
																<th>PROFESSION</th>
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php echo $row['Age'];?></td>                                          
                                            <td><?php echo $row['Profession'];?></td>                                          
                                            <td><?php echo "<a href='SuppPatients.php?id=".$row['CodePatient']."' title='Supprimer le patient'><span class='glyphicon glyphicon-list'></span> Afficher détail</a>";?></td>                                           
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
						$sql=mysql_query("SELECT * FROM Patients WHERE CodePatient='".$_GET['id']."'");
						while($row=mysql_fetch_array($sql)){
					?>
					
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
						<div class="col-lg-4">
							
							<label>Code du Patient</label>
                            <div class="form-group input-group"> 
								<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
								<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>                                       
								<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" disabled >
                            </div>
							
							<label>Nom et Post-nom du Patient</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                        
								<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" disabled >
                            </div>
							<label>Age du Patient</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>                                          
								<input type="text" class="form-control" name="Age" value="<?php echo $row['Age']; ?>" disabled >
                            </div>
							<label>Sexe</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span><span class="fa fa-female"></span></span>                                        
								<select class="form-control" name="Sexe" disabled >
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
								<input type="text" class="form-control" name="Profession" value="<?php echo $row['Profession']; ?>" disabled >
                            </div>
							
							<label>Etat Civil</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-male"></span></span></span>                                        
								<select class="form-control" name="EtatCivil" disabled >
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
								<input type="text" class="form-control" name="Adresse" value="<?php echo $row['Adresse']; ?>" disabled />
                            </div>
							
							<label>Numéro de Téléphone</label>
                            <div class="form-group input-group"> 	
								<span class="input-group-addon"><span class="fa fa-phone"></span></span>                                          
								<input type="text" class="form-control" name="NumTel" value="<?php echo $row['NumTel']; ?>" disabled >
                            </div>
							
                        </div>
						<div class="col-lg-4">
							<center>							
								<label>Photo actuelle</label>
								<div class="form-group input-group"> 	
									<td><?php echo "<img  width=\"120\" height=\"120\" src=";
										echo '"Patients/';
										echo $row["Photo"];
										echo '"/>';?></td>								
								</div>
							</center>
							<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><span class="fa fa-lock">*</span></span>
                                <input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
                            </div>
                        </div>
                       						
                        <div class="col-lg-12">						
							<center><button type="submit" class="btn btn-danger" onclick="return confirm('Etes-vouos certains de vouloir supprimer définitivement ce patient ?');" name="Supprimer"><span class="glyphicon glyphicon-trash"></span> Supprimer le patient</button></center>
						</div>					
					</form>
				</div>
			</div>
					<?php } }?>

							
<?php
		if(isset($_POST['Supprimer'])){
		
			$Idauto_Patient=$_POST['Idauto_Patient'];
			$MotPasse=$_POST['MotPasse'];
			
			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){	
				$aa = mysql_query("SELECT * FROM Consultations WHERE Idauto_Patient='".$Idauto_Patient."'");
				$bb = mysql_query("SELECT * FROM Hospitalisations WHERE Idauto_Patient='".$Idauto_Patient."'");
				$cc = mysql_query("SELECT * FROM PrescExamens WHERE Idauto_Patient='".$Idauto_Patient."'");
				$dd = mysql_query("SELECT * FROM PrescMedicaments WHERE Idauto_Patient='".$Idauto_Patient."'");
				$ee = mysql_query("SELECT * FROM TourSalles WHERE Idauto_Patient='".$Idauto_Patient."'");
				$ff = mysql_query("SELECT * FROM Facturations WHERE Idauto_Patient='".$Idauto_Patient."'");
				
				if(mysql_num_rows($aa)>0 || mysql_num_rows($bb)>0 || mysql_num_rows($cc)>0 || mysql_num_rows($dd)>0 || mysql_num_rows($ee)>0 || mysql_num_rows($ff)>0 ){
					echo "<div class='col-lg-12'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Impossible de supprimer ce malade, car il est lié aux opérations enregistrées dans la base de données</div></div>";
				}
				else{
					$req="DELETE FROM Patients WHERE Idauto_Patient='".$Idauto_Patient."'";
					$result=mysql_query($req);
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
									<span class='glyphicon glyphicon-remove'></span>Echec de Suppression du malade! Veuillez recommencer!</div></div>";
					}
					else{ 
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
											<span class='glyphicon glyphicon-ok'></span>Suppression effectuée avec succès! </div></div>";
					}
				}
			}
			else{
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Impossible de supprimer, car le mot de passe pour l'autorisation est incorrect!!!</div></div>";
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