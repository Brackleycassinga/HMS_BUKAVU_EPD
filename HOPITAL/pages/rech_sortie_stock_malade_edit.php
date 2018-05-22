<?php 
	session_start();
	if(isset($_SESSION['IdUtilisateur'])&& isset($_SESSION['Login'])&& isset($_SESSION['MotPasse'])&& isset($_SESSION['Fonction'])&& $_SESSION['Fonction']=='PHARMACIEN'){
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
				
				<?php require_once ("Ajout/menuPharmacie.php");?>
				
            </div>
            <?php require_once ("Ajout/navDroit.php");?>
        </nav>

    <div id="page-wrapper" style="margin-top:150px;">		
 <div class="container-fluid"> 
  
	<div class="row">
		<div class="col-lg-16">
			<h1 class="page-header" style="color:rgb(90, 100, 211);">
                 Gestion des Malades en ligne <small>  : MODIFICATION DE LIVRAISON DE MED. AUX MALADES </small> 
				  <img src="IMA/setup.jpg" width="120px" height="80px"/>
             </h1>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           FORMULAIRE DE MODIFICATION DE LIVRAISONS DE MEDICAMENTS AUX MALADES
                        </div>
                        <div class="panel-body">
                            <div class="row">                                
                                <div class="col-lg-6">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                       											
										<label>Code ou Nom du malade bénéficiaire de médicament</label>
                                        <div class="form-group input-group">                                            
                                            <input type="text" class="form-control" name="Mot" placeholder="Un mot suffit pour votre recherche" required >
											<span class="input-group-addon"><button type="submit" class="btn btn-success" name="Rechercher" ><span class="glyphicon glyphicon-search"></span></button></span>
                                        </div>
									</form>
								</div>							 
                            </div>
                        
							 <?php
								if(isset($_POST['Rechercher'])){
									$Mot=$_POST['Mot'];
									require_once("BDD/connect.php");
									
									$sqlSearch=mysql_query("SELECT * FROM Utilisateurs, PrescMedicaments, Patients, SortieMedMalades WHERE 
															(Patients.CodePatient LIKE '%$Mot%' OR Patients.Noms LIKE '%$Mot%') 
															AND Patients.Idauto_Patient=PrescMedicaments.Idauto_Patient AND Utilisateurs.IdUtilisateur=PrescMedicaments.IdUtilisateur 
															AND PrescMedicaments.IdPrescMed=SortieMedMalades.IdPrescMed") or die(mysql_error());
									if (mysql_num_rows($sqlSearch)>0){
										echo"<div class='col-lg-12'>                       
												<div class='panel-body'>
													<div class='table-responsive'>
													<center><font style='font-weight:bold; color:green'>VOICI QUELQUE(S) PROPOSITION(S) TROUVEES POUR [ \" $Mot \"]</font></center>
														<br/>
													<table class='table'>
														
														<thead>
															<tr>
																<th>DATE </th>
																<th>CODE MALADE</th>
																<th>PHOTO</th>
																<th>NOMS DU MALADE</th>
																<th>SEXE</th>
																<th>MEDICAMENT</th>
																<th>QTE LIVREE</th>
																<th>ACTION ENVISAGEE</th>
																
															</tr>
														</thead>";
										while($row=mysql_fetch_array($sqlSearch)){
											
											
							 ?>
				
                                    <tbody>
                                        <tr>
                                            
                                            <td><?php $DateSortieMedMal = new DateTime($row['DateSortieMedMal']);
														echo Date_Format($DateSortieMedMal,'d-m-Y');
												?>
											</td>
                                            <td><?php echo $row['CodePatient'];?></td>
											<td><?php echo "<img  width=\"80\" height=\"80\" src=";
														echo '"Patients/';
														echo $row["Photo"];
														echo '"/>';?></td>
                                            <td><?php echo $row['Noms'];?></td>                                          
                                            <td><?php echo $row['Sexe'];?></td>                                          
                                            <td><?php
													// Affichage du medicament livré
													$rechEx=mysql_query("SELECT * FROM SortieMedMalades, Medicaments WHERE SortieMedMalades.IdSortieMedMal='".$row['IdSortieMedMal']."' AND SortieMedMalades.IdMedicament=Medicaments.IdMedicament");
													$ligne=mysql_fetch_array($rechEx);
													echo $ligne['DesignMedicament']." ".$ligne['Dosage'];														
												?>
											</td>                                          
                                            <td><?php echo $ligne['QteLivreeMedMal'];?></td>                                          
                                            <td><?php 
													echo "<a href='rech_sortie_stock_malade_edit.php?id=".$row['IdSortieMedMal']."' title='Cliquez ici pour afficher les détails'>
														<span class='glyphicon glyphicon-edit'></span> Afficher détail</a>";
												?>
											</td>                                           
                                        </tr>                                      

							<?php
										}										
									}else{
										echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
												<span class='glyphicon glyphicon-remove'></span>
													Aucune livraison des médicaments trouvée pour [".$Mot."], vérifiez-le et réessayer!!</div></div>";
									}
								}
							?>
						</div>
                    </div>
					<?php 
						if(isset($_GET['id'])){
							require_once("BDD/connect.php");
							$sql=mysql_query("SELECT * FROM SortieMedMalades, PrescMedicaments, Patients  WHERE SortieMedMalades.IdSortieMedMal='".$_GET['id']."' AND SortieMedMalades.IdPrescMed=PrescMedicaments.IdPrescMed AND Patients.Idauto_Patient=PrescMedicaments.Idauto_Patient");
							while($row=mysql_fetch_array($sql)){
					?>
					
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<div class="panel panel-green">
								<div class="panel-body">
												
									<div class="col-lg-6">					
										<label style="color:red;">Code et noms complets du Patient </label>
										<div class="form-group input-group"> 
											<input type="hidden" name="Idauto_Patient" value="<?php echo $row['Idauto_Patient']; ?>"></tr>		
											<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>                                       
											<input type="text" class="form-control" name="CodePatient" value="<?php echo $row['CodePatient']; ?>" readonly >
											<input type="text" class="form-control" name="Noms" value="<?php echo $row['Noms']; ?>" readonly >
										</div>
								<?php
									$rech=mysql_query("SELECT * FROM PrescMedicamentsCompose, Medicaments WHERE IdPrescMed='".$row['IdPrescMed']."' AND PrescMedicamentsCompose.IdMedicament='".$row['IdMedicament']."'
										AND PrescMedicamentsCompose.IdMedicament=Medicaments.IdMedicament") or die(mysql_error());
									$ligne=mysql_fetch_array($rech);										
								?>							
										<label>Médicament livré</label>
										<div class="form-group input-group">
											<input type="hidden" name="IdSortieMedMal" value="<?php echo $row['IdSortieMedMal']; ?>">
											<input type="hidden" name="IdMedicament" value="<?php echo $ligne['IdMedicament']; ?>" required>
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
											<input type="text" class="form-control" name="DesignMedicament" value="<?php echo $ligne['DesignMedicament']." ".$ligne['Dosage']; ?>" readonly>											
										</div>
										<label>Quantité Prescrite par le médecin</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
											<input type="text" class="form-control" name="QuantiteDemande" value="<?php echo $ligne['QuantiteDemande']; ?>" readonly>											
										</div>
									</div>
									<div class="col-lg-6">
										
										<label>Quantité livrée</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>
											<input type="hidden" class="form-control" name="AncQteLivree" value="<?php echo $row['QteLivreeMedMal']; ?>">											
											<input type="text" class="form-control" name="QteLivreeMedMal" value="<?php echo $row['QteLivreeMedMal']; ?>" placeholder="La quantité livrée" required>											
										</div>
										<label>Prix unitaire de livraison</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="glyphicon glyphicon-hand-right"></span></span>																				
											<input type="text" class="form-control" name="PrixUnitMedMal" value="<?php echo $row['PrixUnitMedMal']; ?>" placeholder="Le prix unitaire de la livraison" required>											
										</div>
								<?php 
									}
								?>
										<label style="color:red;">Mot de passe d'autorisation (Pour AG ou MD)</label>
										<div class="form-group input-group">
											<span class="input-group-addon"><span class="fa fa-lock">*</span></span>
											<input type="password" class="form-control" name="MotPasse" placeholder="Mot de passe pour l'autorisation" required >
										</div>
									</div>
									<div class="col-lg-12">
											<center><button type="submit" class="btn btn-success" name="Modifier"><span class="glyphicon glyphicon-edit"></span> Enregistrer les modifications</button></center>
									</div>
									
								</div>					
							</div>										
						</form>
				
					<?php 
						} 
					?>

							
<?php
	if(isset($_POST['Modifier'])){
		
		$IdSortieMedMal=$_POST['IdSortieMedMal'];
		$IdMedicament=$_POST['IdMedicament'];
		$AncQteLivree=$_POST['AncQteLivree'];
		$QteLivreeMedMal=$_POST['QteLivreeMedMal'];
		$PrixUnitMedMal=$_POST['PrixUnitMedMal'];
		$DesignMedicament=$_POST['DesignMedicament'];
		$Noms=$_POST['Noms'];
		$MotPasse=$_POST['MotPasse'];

			require_once("BDD/connect.php");
			$rqt=mysql_query("SELECT * FROM Utilisateurs WHERE MotPasse LIKE BINARY '".$MotPasse."' AND (Fonction='MD' OR Fonction='AG')");
			if(mysql_num_rows($rqt)>0){
				$sql=mysql_query("SELECT * FROM Medicaments WHERE IdMedicament='".$IdMedicament."'");
				$rech=mysql_fetch_array($sql);
				$Nvl=$rech['StockExistant'] + $AncQteLivree - $QteLivreeMedMal;
				if($Nvl>0){
					$req="UPDATE SortieMedMalades SET QteLivreeMedMal='".$QteLivreeMedMal."', PrixUnitMedMal='".$PrixUnitMedMal."' WHERE IdSortieMedMal='".$IdSortieMedMal."'";			
					$result=mysql_query($req) or die(mysql_error());
					if (!$result){
						echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-remove'></span>Echec de modification. <br>".mysql_error()."</div></div>";
					}
					else{ 
						mysql_query("UPDATE Medicaments SET StockExistant='".$Nvl."' WHERE IdMedicament='".$IdMedicament."'");
						echo "<div class='col-lg-6'><div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								<span class='glyphicon glyphicon-ok'></span> &nbsp; La livraison de medicament ".$DesignMedicament." au malade ".$Noms." a été modifiée avec succès. </div></div>";
					}
				}
				else{
					echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							<span class='glyphicon glyphicon-remove'></span>Impossible d'enregistrer les modifications, car le stock deviendra négatif pour le médicament ".$DesignMedicament."</div></div>";
				}
			}
			else{
				echo "<div class='col-lg-6'><div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						<span class='glyphicon glyphicon-remove'></span>Impossible de modifier, car le mot de passe pour l'autorisation est incorrect!!!</div></div>";
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